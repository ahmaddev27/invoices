<?php

namespace App;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    protected $fillable=['name'];


    public function getNameAttribute($value){

        return ucfirst($value);

    }

    public function scopewhereRoleNot($query,$ole_id){

        return $query->whereNotIn('id',(array)$ole_id);

    }

}

