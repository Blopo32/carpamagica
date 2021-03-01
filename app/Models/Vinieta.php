<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * Modelo de la tabla "Vinietas" de la base de datos
 */
class Vinieta extends Model
{
    use HasFactory;
    public $timestamps = false;

    // le indicamos que estamos usando "cod" como primary key
    // por defecto eloquent interpreta que la primary key es "id"
    protected $primaryKey = 'cod';
}
