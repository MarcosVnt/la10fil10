<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rutero extends Model
{
    use HasFactory;

    
    protected $fillable = ['nombre','conductor_id','ruta_id','activo']; 


    public function conductor(): BelongsTo
    {
        return $this->belongsTo(Conductor::class);
    }

    public function ruta(): BelongsTo
    {
        return $this->belongsTo(Ruta::class);
    }
}
