<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;

    public function classroom(){
        //kasih tau bahwa student hanya punya 1 classroom => belongsTo
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }
}
