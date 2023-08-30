<?php
namespace Src\Qualities\Domain\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quality extends Model
{
    use HasFactory;

    protected $table = 'table_calidades';
    // Otros atributos y métodos del modelo, si es necesario
    protected $fillable = ['nombre','descripcion' ,'comentarios'];

}
