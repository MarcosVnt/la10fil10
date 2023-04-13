<?php

namespace App\Models;

use App\Models\Vehiculo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Remolque extends Model
{
    use HasFactory;
    protected $fillable = ['letraq','marca','modelo','matricula','tipo','vehiculo_id']; 

  

    public function vehiculo(): BelongsTo
    {
        return $this->belongsTo(Vehiculo::class);
    }



}
