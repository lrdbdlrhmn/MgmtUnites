<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonneUnite extends Model
{
    protected $fillable = ['unite_id','personne_id','qualification_id','fonctionp_id','grade_id','date','etat','created_at','updated_at'];

    //
}
