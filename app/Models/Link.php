<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $fillable = ['project_id', 'title', 'url'];

    /**
     * The project that this link belongs to.
     */
    public function project()
    {
        // A link belongs to one project
        return $this->belongsTo(Project::class);
    }
}

