<?php

namespace App\Models;

use App\Models\Rutero;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ruta extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','documento','conductor_id'
   ]; 


   public function ruteros(): HasMany
   {
       return $this->hasMany(Rutero::class);
   }

}
