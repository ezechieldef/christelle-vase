<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Patient
 *
 * @property $id
 * @property $CodeUIC
 * @property $TypePopulation
 * @property $Sexe
 * @property $DateNaissance
 * @property $created_at
 * @property $updated_at
 *
 * @property TypePopulation $typePopulation
 * @property RdvARV[] $rdvARVS
 * @property RdvCV[] $rdvCVS
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Patient extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['CodeUIC', 'TypePopulation', 'Sexe', 'DateNaissance'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'DateNaissance' => 'date',
    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typePopulation()
    {
        return $this->belongsTo(\App\Models\TypePopulation::class, 'TypePopulation', 'TypePopulation');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rdvARVS()
    {
        return $this->hasMany(\App\Models\RdvARV::class, 'Patient', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rdvCVS()
    {
        // dd($this->hasMany(\App\Models\RdvCV::class, 'Patient', 'id')->toSql());
        return $this->hasMany(RdvCV::class, 'Patient', 'id');
    }
    static function getAllAgent()
    {
        return User::role('agent-gestionnaire');
    }
    function getAgentGestionnaireId()
    {
        return $this->hasMany(AssocAgentPatient::class, 'Patient', 'id')->first()?->Agent;
    }
    function agentGestionnaire()
    {
        return User::find($this->getAgentGestionnaireId());
    }
    function age()
    {
        $dateNaissance = new \DateTime($this->DateNaissance);
        $now = new \DateTime();
        $diff = $now->diff($dateNaissance);
        return $diff->y;
    }
}
