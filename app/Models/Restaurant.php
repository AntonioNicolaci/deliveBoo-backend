<?php

namespace App\Models;

use App\Models\User;
use App\Models\Plate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Restaurant extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // relazione uno a molti con la tabella plates
    public function plates()
    {
        return $this->hasMany(Plate::class);
    }
}
