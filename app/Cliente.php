<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public $timestamps = true;
    public $table = 'clientes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nome',
        'documento',
        'telefone',
        'email',
        'ativo'
    ];
    protected $hidden = [
        '_token',
    ];
}
