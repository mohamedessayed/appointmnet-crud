<?php

namespace Database\Seeders;

use App\Models\Bed;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        for ($i=0; $i < 5 ; $i++) { 
            # code...

            Bed::create([
                'name'=>"bed $i"
            ]);
        }
    }
}
