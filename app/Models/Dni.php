<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dni extends Model
{
    use HasFactory;
    
    protected $fillable = ['dni', 'country_id','nombre', 'direccion1', 'direccion2','localidad','municipio','provincia', 'codigo_postal','telefono','fax','movil','email'];



    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}
