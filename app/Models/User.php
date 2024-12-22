<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'status',
        'company_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Role Relationship (one-to-many)
     */
    public function role()
    {
        return $this->belongsTo(Role::class); // A user belongs to one role
    }


    /**
     * Students managed by the user as an admin
     */
    public function studentsAsAdmin()
    {
        return $this->hasMany(StudentRelation::class, 'admin_id', 'id');
    }

    /**
     * Students associated with the user as a trainer
     */
    public function studentsAsTrainer()
    {
        return $this->hasMany(StudentRelation::class, 'trainer_id', 'id');
    }

    /**
     * Admin associated with the user as a trainings
     */
    public function admin()
    {
        return $this->hasOne(StudentRelation::class, 'student_id', 'id')->with('admin');
    }

    /**
     * Trainer associated with the user as a trainings
     */
    public function trainer()
    {
        return $this->hasOne(StudentRelation::class, 'student_id', 'id')->with('trainer');
    }

    public function isActive()
    {
        return $this->status === 1;
    }


    public function company()
    {
        return $this->belongsTo(Company::class);
    }


/**
 * Cast attributes
 */
protected
function casts(): array
{
    return [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
}
