<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehiculo extends Model
{
    use HasFactory;

    protected $fillable = ['letraq','marca','modelo','matricula','dni_id','letraq_id','remolque_id','active']; 

    public function dni(): BelongsTo
    {
        return $this->belongsTo(Dni::class);
    }

    public function letraq(): BelongsTo
    {
        return $this->belongsTo(Letraq::class);
    }


    public function remolque(): BelongsTo
    {
        return $this->belongsTo(Remolque::class);
    }


  

    
}

