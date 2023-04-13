<?php

namespace App\Models;

use App\Models\Dni;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class country extends Model
{
    use HasFactory;

    //public $timestamps = false;

    protected $fillable = ['code','name'];

    public function dnis(): HasMany
    {
        return $this->hasMany(Dni::class);
    }


}
