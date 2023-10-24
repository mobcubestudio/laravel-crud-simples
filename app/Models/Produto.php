<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        "nome",
        "marca",
        "valor"
    ];

    #region Mutator
    public function getValorFormatadoAttribute()
    {
        if ($this->valor) {
            return 'R$ ' . number_format($this->valor, 2, ',', '.');
        }
        return null;
    }
    #endregion
}
