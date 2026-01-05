<?php

namespace Database\Seeders;

use App\Models\User;
use COM;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
public function run(): void
{
    $this->call([
        DepartmentSeeder::class,
        RoleSeeder::class,
        AdminUserSeeder::class,
        StaffSeeder::class,
        PatientSeeder::class,
        AppointmentSeeder::class,
        PatientContactSeeder::class,
        PatientMedicalHistorySeeder::class,
        WardSeeder::class,
        BedSeeder::class,
        AdmissionSeeder::class,
        ConsultationSeeder::class,
        VitalSeeder::class,
        DiagnosisSeeder::class,
        TreatmentPlanSeeder::class,
    ]);
}


}
