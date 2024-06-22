<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypePopulationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pops = [
            [
                "TypePopulation" => "General Population",
                "Description" => "General Population",
            ]
        ];
        foreach ($pops as $pop) {
            \App\Models\TypePopulation::updateOrCreate(
                ["TypePopulation" => $pop["TypePopulation"]],
                $pop
            );
        }
    }
}
