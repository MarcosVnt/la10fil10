<?php

namespace App\Models;

use App\Models\Explotacion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable = ['pais','dni', 'nombre', 
    'direccion1', 'direccion2', 'localidad','municipio','provincia','codigo_postal','telefono','fax','movil','actividad','email',
    'registro_sanitario', 'registro_compra','codigo_laboratorio'];


    public function explotaciones(): HasMany
    {
        return $this->hasMany(Explotacion::class);
    }

   

}
