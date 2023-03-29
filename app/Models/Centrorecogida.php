<?php

namespace App\Models;

use App\Models\Industria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Centrorecogida extends Model
{
    use HasFactory;

    protected $fillable = ['industria_id','pais','dni', 'nombre', 
    'direccion1', 'direccion2', 'localidad','municipio','provincia','codigo_postal','telefono','fax','movil','email'];



    public function industria(): BelongsTo
    {
        return $this->belongsTo(Industria::class);
    }
}
