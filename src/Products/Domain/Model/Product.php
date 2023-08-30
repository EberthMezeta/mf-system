<?php
namespace Src\Products\Domain\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'table_productos'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'familia_id',
        'nombre',
        'url_foto',
        'comentarios',
    ];

    public function familia()
    {
        return $this->belongsTo(Familia::class, 'familia_id');
    }
}
