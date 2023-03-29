<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dni extends Model
{
    use HasFactory;
    
    protected $fillable = ['dni', 'codigo_pais', 'direccion1', 'direccion2','comunidad','provincia', 'localidad', 'codigo_postal', 'pais'];



    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_code', 'code');
    }
}
