<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Task;

class Training extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'trainer_id',
        'admin_id',
        'company_id',
        'status',
        'training_book',
        'Additional_notes'
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function trainer()
    {
        return $this->belongsTo(User::class, 'trainer_id');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}
