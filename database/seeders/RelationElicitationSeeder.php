<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RelationElicitationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //partenaire sexuel (PS) , enfant biologique ( C ) , Parent biologique (P)
        $rels = [
            [
                'CodeRelation' => 'PS',
                'LibelleRelation' => 'Partenaire Sexuel',
            ],
            [
                'CodeRelation' => 'C',
                'LibelleRelation' => 'Enfant Biologique',
            ],
            [
                'CodeRelation' => 'P',
                'LibelleRelation' => 'Parent Biologique',
            ],
        ];

        foreach ($rels as $rel) {
            \App\Models\RelationElicitation::updateOrCreate(['CodeRelation' => $rel['CodeRelation']], $rel);
        }
    }
}
