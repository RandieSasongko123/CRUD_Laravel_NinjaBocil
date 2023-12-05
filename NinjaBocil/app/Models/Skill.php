<?php

namespace App\Models;

use App\Models\User;
use App\Models\Tailed;
use App\Models\Karakter;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skill extends Model
{
    use HasFactory, Sluggable;

    public function sluggable(): array
    {
        return [
            'slug_skill' => [
                'source' => 'nama_skill'
            ]
        ];
    }

    protected $fillable = [
        'user_id',
        'fotoskill',
        'nama_skill',
        'slug_skill',
        'grade_skill',
        'damage_skill',
        'chakra_skill',
        'proc_rate_skill',
        'effect_skill',
        'launch_skill',
        'restriction_skill',
        'kartegori',
        'tier_skill',
        'round_skill'
    ];

    /**
     * Get all of the comments for the Skill
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tailed_skill(): HasMany
    {
        return $this->hasMany(Tailed::class, 'skill_1_tailed', 'id');
    }

    public function karakter_skill(): HasMany
    {
        return $this->hasMany(Karakter::class, 'skill_1_karakter', 'id');
    }

    /**
     * Get the user that owns the Skill
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function writer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

