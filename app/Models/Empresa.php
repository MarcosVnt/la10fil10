<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable = ['dni', 'nombre', 'registro_sanitario', 'registro_compra','codigo_laboratorio'];

}
