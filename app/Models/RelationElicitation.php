<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelationElicitation extends Model
{
    use HasFactory;
    // protected $table = 'relation_elicitations';
    protected $primaryKey = 'CodeRelation';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['CodeRelation', 'LibelleRelation'];
}
