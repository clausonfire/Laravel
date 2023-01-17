<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'telefono',
        'edad',
        'password',
        'email',
        'sexo',
        'teacher_id'
    ];
    protected $hidden = [
        'password',
        'remember_token',
        
    ];

    //1:N inversa
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    
}
