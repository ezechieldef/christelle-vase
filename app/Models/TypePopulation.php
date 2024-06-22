<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TypePopulation
 *
 * @property $TypePopulation
 * @property $Description
 * @property $created_at
 * @property $updated_at
 *
 * @property RdvARV[] $rdvARVS
 * @property RdvCV[] $rdvCVS
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TypePopulation extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['TypePopulation', 'Description'];
    protected $primaryKey = 'TypePopulation';
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rdvARVS()
    {
        return $this->hasMany(\App\Models\RdvARV::class, 'TypePopulation', 'TypePopulation');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rdvCVS()
    {
        return $this->hasMany(\App\Models\RdvCV::class, 'TypePopulation', 'TypePopulation');
    }
}
