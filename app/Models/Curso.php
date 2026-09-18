<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'requisito',
        'carga_horaria',
        'valor',
    ];
    protected $cast =[
        'categoria_id'=>'intiger'
    ];
    public function categoria()
    {
        return $this -> belongTo(categoriaAluno::class,'categoria_id');
    }
}
