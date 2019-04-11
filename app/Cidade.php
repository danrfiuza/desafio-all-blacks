<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    public $timestamps = true;
    public $table = 'cidades';
    protected $primaryKey = 'id';
    protected $fillable = [
        'uf',
        'cidade',
        'endereco',
        'ativo'
    ];
    protected $hidden = [
        '_token',
    ];
}
