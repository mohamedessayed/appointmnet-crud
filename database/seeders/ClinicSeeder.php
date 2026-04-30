<?php

namespace Database\Seeders;

use App\Models\Clinic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ClinicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        for ($i=0; $i < 10 ; $i++) { 
            # code...
            $counter = $i+1;
            Clinic::create([
                'name' => "clinic ${counter}",
            ]);
        }
    }
}
