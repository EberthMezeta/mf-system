<?php

namespace Src\Brands\Domain\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table = 'table_marcas';
    protected $fillable = ['nombre', 'comentarios'];

}
