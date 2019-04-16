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

    public function endereco()
    {
        return $this->hasOne(Endereco::class, 'cliente_id', 'id');
    }

    public static function getClienteByDocumento($documento)
    {
        $documento = str_replace(['-','.'],['',''],trim($documento));
        if(!$documento) {
            return Cliente::class;
        }
        return self::where('documento',$documento)->first();
    }
}
