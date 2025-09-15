<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email'];

    /**
     * The projects that this person belongs to.
     */
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}

