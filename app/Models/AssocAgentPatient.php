<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AssocAgentPatient
 *
 * @property $id
 * @property $Patient
 * @property $Agent
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @property Patient $patient
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class AssocAgentPatient extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['Patient', 'Agent'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'Agent', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function patient()
    {
        return $this->belongsTo(\App\Models\Patient::class, 'Patient', 'id');
    }
    
}
