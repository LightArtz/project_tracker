<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // Allow these fields to be mass-assigned
    protected $fillable = ['name', 'description'];

    /**
     * The people that belong to the project.
     */
    public function people()
    {
        // A project can have many people, and a person can have many projects
        return $this->belongsToMany(Person::class);
    }

    /**
     * The links that belong to the project.
     */
    public function links()
    {
        // A project has many links
        return $this->hasMany(Link::class);
    }
}
    
