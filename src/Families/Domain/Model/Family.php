<?php

namespace Src\Families\Domain\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;

    protected $table = 'table_families';
    protected $fillable = ['nombre', 'comentarios'];

    // Mapeo de nombres de atributos en inglés
    //protected $attributes = [
   //     'nombre' => 'name',
   //     'comentarios' => 'comments',
   // ];



}
