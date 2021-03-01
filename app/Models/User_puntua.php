<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_puntua extends Model
{
    use HasFactory;
    public $timestamps = false;

    // le indico el nombre de la tabla a la que hace referencia el modelo
    protected $table = 'user_puntua';
}
