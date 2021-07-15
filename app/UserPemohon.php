<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPemohon extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
    	'nama', 'nik', 'password',
    ];
}
