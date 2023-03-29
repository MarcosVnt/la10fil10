<?php

namespace App\Models;

use App\Models\Centrorecogida;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Industria extends Model
{
    use HasFactory;

    
    protected $fillable = ['pais','dni', 'nombre', 
    'direccion1', 'direccion2', 'localidad','municipio','provincia','codigo_postal','telefono','fax','movil','email'];


    public function Centrosderecogida(): HasMany
    {
        return $this->hasMany(Centrorecogida::class);
    }

}
