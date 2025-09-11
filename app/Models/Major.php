<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Major extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'image',
        'competency_head',
        'competency_head_photo', // The new field for the photo
        'publisher',
    ];

    /**
     * Get the testimonials for the major.
     */
    public function testimonials(): HasMany
    {
        return $this->hasMany(Testimonial::class);
    }
}