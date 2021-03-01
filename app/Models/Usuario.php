<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * Modelo de la tabla "Usuarios" de la base de datos
 */
class Usuario extends Model
{
    use HasFactory;

    // variable para eliminar que se cargue en la tabla la fecha de creacion y de modificacion automaticamente
    // en un futuro lo ideal seria quitarla para que esto se hiciera
    // en la tabla "user" se puede ver el formato de esas columnas
    public $timestamps = false;

    // le indicamos que estamos usando "cod" como primary key
    // por defecto eloquent interpreta que la primary key es "id"
    protected $primaryKey = 'cod';
}
