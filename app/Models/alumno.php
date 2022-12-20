<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alumno extends Model
{
    public $timerstamps = false;
    protected $fillable = [
        'id',
        'nom_alumno',
        'ape_alumno',
        'dni_alumno'
    ];
}
