<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'data' => 'array',
    ];
    public fuction notifiable()
    {
        return $this->morphTo();
    }
}
