<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Company extends Model
{
    use HasFactory, Notifiable;


    protected $fillable = ['name', 'email', 'location'];

    public function trainer()
    {
        return $this->hasMany(User::class, 'trainer_id');
    }
}
