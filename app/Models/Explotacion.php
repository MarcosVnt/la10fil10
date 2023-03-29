<?php

namespace App\Models;

use App\Models\Empresa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Explotacion extends Model
{
    use HasFactory;

    protected $fillable = ['pais','dni', 'nombre', 
    'direccion1', 'direccion2', 'localidad','municipio','provincia','codigo_postal','telefono','fax','movil','email'];




    public function empresa(): BelongsTo
    {
        return $this->belongsTo(Empresa::class);
    }

}
