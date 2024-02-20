<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class NotificationSetting extends BaseModel
{
    protected $fillable = [
        'name',
        'primary_color',
        'related_to_type',
        'related_to_id',
    ];

    public function settings(): HasMany
    {
        return $this->hasMany(NotificationSettingPivot::class);
    }

    public function divisions(): MorphToMany
    {
        return $this->morphedByMany(
            related: Division::class,//Giải nghĩa cách viết???
            name: 'related_to',
            table: 'notification_setting_pivot'
        )->using(NotificationSettingPivot::class)
            ->withPivot('id')
            ->withTimestamps();
    }
}
