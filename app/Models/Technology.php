<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'badge_color', 'slug'];

    public function project()
    {
        return $this->belongsToMany(Project::class);
    }
}
