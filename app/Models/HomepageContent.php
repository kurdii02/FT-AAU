<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomepageContent extends Model
{
    use HasFactory;

    protected $table = 'homepage_contents';

    protected $fillable = ['section', 'content'];

    protected $casts = [
        'content' => 'array',
    ];
}
