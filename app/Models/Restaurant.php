<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function plates()
    {
        return $this->hasMany(Plate::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function users()
    {
        return $this->hasOne(User::class);
    }

    public function types()
    {
        return $this->belongsToMany(Type::class);
    }
}
