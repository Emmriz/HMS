<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bill;
use App\Models\BillItem;
use App\Models\Patient;
use App\Models\Staff;

class BillsSeeder extends Seeder
{
    public function run(): void
    {
        $patients = Patient::all();
        $doctors = Staff::where('role', 'doctor')->get();

        if ($patients->isEmpty() || $doctors->isEmpty()) {
            $this->command->info('No patients or doctors found.');
            return;
        }

        $doctor = $doctors->first();

        foreach ($patients as $patient) {
            $total = 0;

            // Get first treatment plan linked via appointment -> consultation
            $treatmentPlan = null;
            $patient->appointments->each(function ($appointment) use (&$treatmentPlan) {
                if ($appointment->consultation && $appointment->consultation->treatmentPlans->isNotEmpty()) {
                    $treatmentPlan = $appointment->consultation->treatmentPlans->first();
                }
            });

            // Create the bill
            $bill = Bill::firstOrCreate(
                [
                    'patient_id' => $patient->id,
                ],
                [
                    'treatment_plan_id' => $treatmentPlan->id ?? null,
                    'total_amount' => 0,
                    'status' => 'pending',
                    'notes' => 'Auto-generated bill',
                ]
            );

            // -------------------------------
            // Add prescriptions to bill items
            // -------------------------------
            $patient->prescriptions->each(function ($prescription) use ($bill, &$total) {
                foreach ($prescription->items as $item) {
                    $lineAmount = $item->amount ?? 1000; // default if missing
                    $lineQuantity = $item->quantity ?? 1;
                    $lineTotal = $lineAmount * $lineQuantity;

                    BillItem::firstOrCreate(
                        [
                            'bill_id' => $bill->id,
                            'item_type' => 'prescription',
                            'item_id' => $item->id,
                        ],
                        [
                            'description' => $item->drug->name ?? 'Medication',
                            'amount' => $lineAmount,
                            'quantity' => $lineQuantity,
                            'total' => $lineTotal,
                        ]
                    );

                    $total += $lineTotal;
                }
            });

            // -------------------------------
            // Add lab requests to bill items
            // -------------------------------
            $patient->appointments->each(function ($appointment) use ($bill, &$total) {
                if ($appointment->labRequests()->exists()) {
                    $appointment->labRequests->each(function ($request) use ($bill, &$total) {
                        $lineAmount = $request->labTest->price ?? 500; // default if missing
                        $lineQuantity = 1;
                        $lineTotal = $lineAmount * $lineQuantity;

                        BillItem::firstOrCreate(
                            [
                                'bill_id' => $bill->id,
                                'item_type' => 'lab_request',
                                'item_id' => $request->id,
                            ],
                            [
                                'description' => $request->labTest->name ?? 'Lab Test',
                                'amount' => $lineAmount,
                                'quantity' => $lineQuantity,
                                'total' => $lineTotal,
                            ]
                        );

                        $total += $lineTotal;
                    });
                }
            });

            // -------------------------------
            // Update the bill total
            // -------------------------------
            $bill->update(['total_amount' => $total]);
        }

        $this->command->info('Bills seeded successfully.');
    }
}