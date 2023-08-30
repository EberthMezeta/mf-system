<?php


namespace Src\Packaging\Domain\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packaging extends Model
{
    use HasFactory;
    protected $table = 'table_empaques';
    protected $fillable = ['nombre','es_kilo', 'comentarios'];

}
