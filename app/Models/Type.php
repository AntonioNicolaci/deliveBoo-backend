<?php

namespace App\Models;

use App\Models\Restaurant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function restaurants()
    {
        return $this->belongsToMany(Restaurant::class);
    }
}
