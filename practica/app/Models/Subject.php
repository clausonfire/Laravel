<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'teacher_id'
    ];
    protected $hidden = [
                
    ];

    //1:1 
    public function teacher()
    {
        return $this->hasOne(Teacher::class);
    }
}
