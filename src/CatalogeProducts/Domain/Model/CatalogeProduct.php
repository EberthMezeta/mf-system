<?php

namespace Src\CatalogeProducts\Domain\Model;

use Illuminate\Database\Eloquent\Model;
use Src\Brands\Domain\Model\Brand;
use Src\Presentations\Domain\Model\Presentation;
use Src\Products\Domain\Model\Product;
use Src\Qualities\Domain\Model\Quality;
use Src\Sizes\Domain\Model\Size;
use Src\Types\Domain\Model\Type;

class CatalogeProduct extends Model
{
    protected $table = 'table_catalogo_productos'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'producto_id',
        'tipo_id',
        'tamano_id',
        'marca_id',
        'presentacion_id',
        'calidad_id',
        'url_foto',
        'nomenclatura',
        'nombre_corto',
        'comentarios'

    ];

    public function producto()
    {
        return $this->belongsTo(Product::class, 'producto_id');
    }

    public function tipo()
    {
        return $this->belongsTo(Type::class, 'tipo_id');
    }

    public function tamano()
    {
        return $this->belongsTo(Size::class, 'tamano_id');
    }

    public function marca()
    {
        return $this->belongsTo(Brand::class, 'marca_id');
    }

    public function presentacion()
    {
        return $this->belongsTo(Presentation::class, 'presentacion_id');
    }

    public function calidad()
    {
        return $this->belongsTo(Quality::class, 'calidad_id');
    }
}
