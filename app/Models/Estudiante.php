<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    public $table = "estudiantes";
    protected $fillable = array("*");

    public function tareas(){
        return $this->belongsToMany(Tarea::class,"estudiante_tarea");
    }
}
