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

    public function getDocumentoAttribute()
    {
        return vsprintf("%s%s%s.%s%s%s.%s%s%s-%s%s", str_split($this->attributes['documento']));
    }

    public function endereco()
    {
        return $this->hasOne(Endereco::class,'cliente_id','id');
    }
}
