<?php

namespace Src\Sizes\Domain\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    protected $table = 'table_tamanos';
    // Otros atributos y métodos del modelo, si es necesario
    protected $fillable = ['nombre','descripcion' ,'comentarios'];
}
