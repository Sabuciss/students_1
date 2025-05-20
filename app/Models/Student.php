<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['first_name', 'last_name' ];

    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
