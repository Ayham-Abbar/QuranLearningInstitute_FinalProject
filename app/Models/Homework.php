<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    protected $fillable = ['title', 'lesson_id', 'description', 'file'];

    use HasFactory;

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'homework_user')
                    ->withPivot('status', 'answer', 'mark')
                    ->withTimestamps();
    }
}
