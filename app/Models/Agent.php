<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone'];

    // One Agent has many Properties
    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
