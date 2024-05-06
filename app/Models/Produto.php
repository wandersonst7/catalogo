<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'produtos';

    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'imagem',
        'quantidade',
        'categoria_id'
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

}
