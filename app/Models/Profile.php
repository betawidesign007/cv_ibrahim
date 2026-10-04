<?php

namespace App\Models;

use Database\Factories\ProfileFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'name',
    'title',
    'headline',
    'avatar',
    'logo_image',
    'logo_initials',
    'bio',
    'about_text',
    'email',
    'phone',
    'location',
    'github_url',
    'linkedin_url',
    'is_available',
    'availability_badge',
    'experience_years',
    'completed_projects',
])]
class Profile extends Model
{
    /** @use HasFactory<ProfileFactory> */
    use HasFactory;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_available' => 'boolean',
            'experience_years' => 'integer',
            'completed_projects' => 'integer',
        ];
    }
}
