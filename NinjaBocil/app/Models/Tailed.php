<?php

namespace App\Models;

use App\Models\Skill;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tailed extends Model
{
    use HasFactory, Sluggable;

    public function sluggable(): array
    {
        return [
            'slug_tailed' => [
                'source' => 'nama_tailed'
            ]
        ];
    }

    protected $fillable = [
        'user_id',
        'foto_tailed',
        'nama_tailed',
        'slug_tailed',
        'skill_1_tailed',
        'skill_2_tailed',
        'skill_3_tailed',
        'skill_4_tailed'
    ];

    // API JSON
    public function tailed_skill_1(): BelongsTo
    {
        return $this->belongsTo(Skill::class, 'skill_1_tailed');
    }

    public function tailed_skill_2(): BelongsTo
    {
        return $this->belongsTo(Skill::class, 'skill_2_tailed');
    }

    public function tailed_skill_3(): BelongsTo
    {
        return $this->belongsTo(Skill::class, 'skill_3_tailed');
}

    public function tailed_skill_4(): BelongsTo
    {
        return $this->belongsTo(Skill::class, 'skill_4_tailed');
    }

    // Update View
    public function skill_1_tailed(): BelongsTo
    {
        return $this->belongsTo(Skill::class, 'skill_1_tailed');
    }

    public function skill_2_tailed(): BelongsTo
    {
        return $this->belongsTo(Skill::class, 'skill_2_tailed');
    }

    public function skill_3_tailed(): BelongsTo
    {
        return $this->belongsTo(Skill::class, 'skill_3_tailed');
    }

    public function skill_4_tailed(): BelongsTo
    {
        return $this->belongsTo(Skill::class, 'skill_4_tailed');
    }

    public function writer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
