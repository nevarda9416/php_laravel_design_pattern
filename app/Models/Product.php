<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'amount', 'description'
    ];

    // Accessors for name column
    // when 'name' will get, it will convert into lowercase
    public function getNameAttribute($value)
    {
        return strtoupper($value);
    }

    // Mutators for name column
    // when 'name' will save, it will convert into lowercase
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }
}
