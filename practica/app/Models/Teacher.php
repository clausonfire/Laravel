<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'asignaturas',
        'telefono',
        'edad',
        'password',
        'email',
        'sexo'
        
    ];
    protected $hidden = [
        'password',
        'remember_token',
        
    ];

    //1:1 inversa
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    //1:N
    public function alumno()
    {
        return $this->hasMany(Alumno::class);
    }
}
