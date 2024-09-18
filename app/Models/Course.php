<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'file',
        'image',
        'description',
        'level_id',
    ];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
    public function exams()
    {
        return $this->hasMany(Exam::class);
    }
}
