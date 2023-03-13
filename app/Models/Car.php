<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    public function users() {
        return $this->belongsTo(User::class);
    }

    public function clients() {
        return $this->belongsTo(Client::class);
    }

    public function platforms() {
        return $this->hasMany(User::class);
    }

}
