<?php

namespace App\Models;

use App\Models\Remolque;
use App\Models\Vehiculo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recogida extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','documento','ruta_id','conductor_id','conductor_2','vehiculo','remolque','created_by',
]; 

public function ruta(): BelongsTo
    {
        return $this->belongsTo(Ruta::class);
    }


public function conductor(): BelongsTo
    {
        return $this->belongsTo(Conductor::class);
    }

public function vehiculo(): BelongsTo
    {
        return $this->belongsTo(Vehiculo::class);
    }

public function remolque(): BelongsTo
    {
        return $this->belongsTo(Remolque::class);
    }

}
