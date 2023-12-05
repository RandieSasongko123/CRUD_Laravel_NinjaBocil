<?php

namespace App\Models;

use App\Models\Skill;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Karakter extends Model
{
    use HasFactory, Sluggable;

    // Membuat slug otomatis terisi berdasarkan nama
    public function sluggable(): array
    {
        return [
            'slug_karakter' => [
                'source' => 'nama_karakter'
            ]
        ];
    }

    protected $fillable = [
        'user_id',
        'foto_karakter',
        'background',
        'nama_karakter',
        'slug_karakter',
        'grade_karakter',
        'quality_karakter',
        'chakra_karakter',
        'tier_karakter',
        'skill_1_karakter',
        'skill_2_karakter',
        'skill_3_karakter',
        'skill_4_karakter',
        'skill_5_karakter',
        'skill_6_karakter',
        'skill_7_karakter',
        'skill_8_karakter',
        'skill_9_karakter',
        'skill_10_karakter'
    ];

    /**
     * Get the user that owns the Karakter
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    //  API Json
    public function karakter_skill_1(): BelongsTo
    {
        return $this->belongsTo(Skill::class, 'skill_1_karakter');
    }

    public function karakter_skill_2(): BelongsTo
    {
        return $this->belongsTo(Skill::class, 'skill_2_karakter');
    }

    public function karakter_skill_3(): BelongsTo
    {
        return $this->belongsTo(Skill::class, 'skill_3_karakter');
    }

    public function karakter_skill_4(): BelongsTo
    {
        return $this->belongsTo(Skill::class, 'skill_4_karakter');
    }

    public function karakter_skill_5(): BelongsTo
    {
        return $this->belongsTo(Skill::class, 'skill_5_karakter');
    }

    public function karakter_skill_6(): BelongsTo
    {
        return $this->belongsTo(Skill::class, 'skill_6_karakter');
    }

    public function karakter_skill_7(): BelongsTo
    {
        return $this->belongsTo(Skill::class, 'skill_7_karakter');
    }

    public function karakter_skill_8(): BelongsTo
    {
        return $this->belongsTo(Skill::class, 'skill_8_karakter');
    }

    public function karakter_skill_9(): BelongsTo
    {
        return $this->belongsTo(Skill::class, 'skill_9_karakter');
    }

    public function karakter_skill_10(): BelongsTo
    {
        return $this->belongsTo(Skill::class, 'skill_10_karakter');
    }

    // Update View

    public function skill_1_karakter(): BelongsTo
    {
        return $this->belongsTo(Skill::class, 'skill_1_karakter');
    }

    public function skill_2_karakter(): BelongsTo
    {
        return $this->belongsTo(Skill::class, 'skill_2_karakter');
    }

    public function skill_3_karakter(): BelongsTo
    {
        return $this->belongsTo(Skill::class, 'skill_3_karakter');
    }

    public function skill_4_karakter(): BelongsTo
    {
        return $this->belongsTo(Skill::class, 'skill_4_karakter');
    }

    public function skill_5_karakter(): BelongsTo
    {
        return $this->belongsTo(Skill::class, 'skill_5_karakter');
    }

    public function skill_6_karakter(): BelongsTo
    {
        return $this->belongsTo(Skill::class, 'skill_6_karakter');
    }

    public function skill_7_karakter(): BelongsTo
    {
        return $this->belongsTo(Skill::class, 'skill_7_karakter');
    }

    public function skill_8_karakter(): BelongsTo
    {
        return $this->belongsTo(Skill::class, 'skill_8_karakter');
    }

    public function skill_9_karakter(): BelongsTo
    {
        return $this->belongsTo(Skill::class, 'skill_9_karakter');
    }

    public function skill_10_karakter(): BelongsTo
    {
        return $this->belongsTo(Skill::class, 'skill_10_karakter');
    }

    public function writer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
