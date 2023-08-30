<?php

namespace Src\Presentations\Domain\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presentation extends Model
{
    use HasFactory;

    protected $table = 'table_presentaciones';
    // Otros atributos y métodos del modelo, si es necesario
    protected $fillable = ['nombre','descripcion' ,'comentarios'];

}
