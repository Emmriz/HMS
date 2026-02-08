<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LabRequest;
use App\Models\LabResult;
use App\Models\Staff;

class LabResultSeeder extends Seeder
{
    public function run(): void
    {
        $labRequests = LabRequest::all();
        $labTechnicians = Staff::where('role', 'lab_tech')->get();

        if ($labRequests->isEmpty() || $labTechnicians->isEmpty()) {
            $this->command->info('No lab requests or lab technicians found.');
            return;
        }

        foreach ($labRequests as $request) {
            $technician = $labTechnicians->first(); // simple: pick first

            LabResult::firstOrCreate(
                ['lab_request_id' => $request->id],
                [
                    'recorded_by_staff_id' => $technician->id,
                    'result' => 'Normal', // placeholder, can be randomized later
                    'remarks' => 'Auto-generated result',
                    'reported_at' => now(),
                ]
            );
        }
    }
}
