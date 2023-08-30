<?php

namespace Src\Types\Domain\Model;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'table_tipos';
    // Otros atributos y métodos del modelo, si es necesario
    protected $fillable = ['nombre','comentarios'];
}
