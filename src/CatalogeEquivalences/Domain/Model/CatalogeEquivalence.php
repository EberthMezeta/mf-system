<?php
namespace Src\CatalogeEquivalences\Domain\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogeEquivalence extends Model
{
    use HasFactory;

    protected $table = 'table_catalogo_equivalencias'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'catalogo_id',
        'cantidad_origen',
        'empaque_origen',
        'cantidad_destino',
        'empaque_destino',
        'es_empaque_compra',
        'es_empaque_venta',
        'utilidad_minima_empaque',
        'comentarios'
    ];

    public function empaqueOrigen()
    {
        return $this->belongsTo(Packaging::class, 'empaque_origen');
    }

    public function empaqueDestino()
    {
        return $this->belongsTo(Packaging::class, 'empaque_destino');
    }
}


