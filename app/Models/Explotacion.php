<?php

namespace App\Models;

use App\Models\Tanque;
use App\Models\Empresa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Explotacion extends Model
{
    use HasFactory;

    protected $fillable = ['pais','dni', 'nombre', 
    'direccion1', 'direccion2', 'localidad','municipio','provincia','codigo_postal','telefono','fax','movil','email','registro_sanitario','codigo_laboratorio',
    'registro_compra','codigo_simogan','empresa_id','status'];




    public function empresa(): BelongsTo
    {
        return $this->belongsTo(Empresa::class);
    }

    public function tanques(): HasMany
    {
        return $this->hasMany(Tanque::class);
    }

}
