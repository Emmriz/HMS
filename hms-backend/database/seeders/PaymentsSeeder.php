<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bill;
use App\Models\Payment;
use Illuminate\Support\Str;

class PaymentsSeeder extends Seeder
{
    public function run(): void
    {
        $bills = Bill::all();

        if ($bills->isEmpty()) {
            $this->command->info('No bills found.');
            return;
        }

        foreach ($bills as $bill) {

            // Skip if already paid
            if ($bill->status === 'paid') {
                continue;
            }

            $amountPaid = $bill->total_amount;

            Payment::firstOrCreate(
                [
                    'bill_id' => $bill->id,
                ],
                [
                    'amount' => $amountPaid,
                    'payment_date' => now()->toDateString(),
                    'payment_method' => 'cash',
                    'paid_at' => now(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );

            // Update bill status
            $bill->update([
                'status' => 'paid'
            ]);
        }

        $this->command->info('Payments seeded successfully.');
    }
}