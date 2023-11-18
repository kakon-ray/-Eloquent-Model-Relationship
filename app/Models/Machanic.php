<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machanic extends Model
{
    use HasFactory;

    public function carOwner(){
        return $this->hasOneThrough(Owner::class, Car::class);
    }
    
    public function carOwners(){
        return $this->hasManyThrough(Owner::class, Car::class);
    }

    public function car(){
        return $this->hasOne(Car::class);
    }
}
