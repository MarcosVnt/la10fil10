<?php

namespace App\Models;

use App\Models\Explotacion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tanque extends Model
{
    use HasFactory;

    protected $fillable = ['letraq','tipo','modelo']; 



    public function explotacion(): BelongsTo
    {
        return $this->belongsTo(Explotacion::class);
    }


}
