<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
        'nome',
        'descricao',
        'status'
    ];

    public function produtos()
    {
        return $this->hasMany(Produtos::class);
    }
}
