<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RdvCV
 *
 * @property $id
 * @property $CodeUIC
 * @property $TypePopulation
 * @property $Sexe
 * @property $DateNaissance
 * @property $DateRDV
 * @property $DatePrelevement
 * @property $NombreCopie
 * @property $ResultatCV
 * @property $created_at
 * @property $updated_at
 * @property Patient $Patient
 *
 * @property TypePopulation $typePopulation
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class RdvCV extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['CodeUIC', 'TypePopulation', 'Patient', 'Sexe', 'DateNaissance', 'DateRDV', 'DatePrelevement', 'NombreCopie', 'ResultatCV'];

    protected $casts = [
        'DateNaissance' => 'date',
        'DateRDV' => 'date',
        'DatePrelevement' => 'date',

    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getTypePopulation()
    {
        return $this->belongsTo(\App\Models\TypePopulation::class, 'TypePopulation', 'TypePopulation');
    }
    static public function sexesPluck()
    {
        return Sexe::sexesPluck();
    }

    /**
     * Get the patient associated with the RdvARV
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function patient()
    {
        return $this->hasOne(Patient::class, 'id', 'Patient');
    }
}
