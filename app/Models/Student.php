<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function class(){
        return $this->BelongsTo(Classes::class, 'sclass');
    }

    public function guardian(){
        return $this->hasOne(Guardian::class, 'student_id');
    }
}
