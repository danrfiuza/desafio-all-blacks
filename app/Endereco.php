<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    public $timestamps = true;
    public $table = 'enderecos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'cliente_id',
        'cep',
        'endereco',
        'bairro',
        'uf',
        'cidade',
        'ativo'
    ];
    protected $hidden = [
        '_token',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class,'id','cliente_id');
    }
}
