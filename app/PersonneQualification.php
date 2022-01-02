<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonneQualification extends Model
{
    //
    protected $fillable = ['personne_id','qualification_id','created_at','updated_at'];
}
