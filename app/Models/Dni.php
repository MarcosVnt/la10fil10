<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dni extends Model
{
    use HasFactory;
    
    protected $fillable = ['dni', 'codigo_pais', 'direccion1', 'direccion2','comunidad','provincia', 'localidad', 'codigo_postal', 'pais'];


}
