<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'amount', 'description', 'slug', 'detail'
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

    /**
     * @return void
     */
    public static function boot(): void
    {
        parent::boot();
        static::creating(function ($model) {
            Log::info('Creating event call: ' . $model);
            $model->slug = Str::slug($model->name);
        });
        static::created(function ($model) {
            Log::info('Created event call: ' . $model);
        });
        static::updating(function ($model) {
            Log::info('Updating event call: ' . $model);
            $model->slug = Str::slug($model->name);
        });
        static::updated(function ($model) {
            Log::info('Updated event call: ' . $model);
        });
        static::deleted(function ($model) {
            Log::info('Deleted event call: ' . $model);
        });
    }
}
