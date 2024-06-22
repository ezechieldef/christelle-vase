<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Elicitation
 *
 * @property $id
 * @property $CodeElicitation
 * @property $PatientIndex
 * @property $CodeUICIndex
 * @property $DateNaissance
 * @property $Sexe
 * @property $CodeRelation
 * @property $isTested
 * @property $TestingCode
 * @property $Result
 * @property $created_at
 * @property $updated_at
 *
 * @property RelationElicitation $relationElicitation
 * @property Patient $patient
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Elicitation extends Model
{

    protected $perPage = 5;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['CodeElicitation', 'PatientIndex', 'CodeUICIndex', 'DateNaissance', 'Sexe', 'CodeRelation', 'isTested', 'TestingCode', 'Result'];
    /** * The attributes that should be cast. * * @var array */
    protected $casts = [
        'DateNaissance' => 'date',
        'isTested' => 'boolean', 'created_at' => 'datetime', 'updated_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function relationElicitation()
    {
        return $this->belongsTo(\App\Models\RelationElicitation::class, 'CodeRelation', 'CodeRelation');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function patient()
    {
        return $this->belongsTo(\App\Models\Patient::class, 'PatientIndex', 'id');
    }
    function age()
    {
        $dateNaissance = new \DateTime($this->DateNaissance);
        $now = new \DateTime();
        $diff = $now->diff($dateNaissance);
        return $diff->y;
    }
}
