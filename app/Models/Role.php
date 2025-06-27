<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name', 'visible_name'];

    /**
     * Define the relationship with the User model
     */
    public function users()
    {
        return $this->hasMany(User::class); // A role can have many users
    }

    /**
     * Optionally, define a custom accessor if needed for the role name
     */
    // If you want to have a custom getter for the 'name' attribute:
    public function getRoleNameAttribute()
    {
        return $this->attributes['name']; // Default role name retrieval
    }
}
