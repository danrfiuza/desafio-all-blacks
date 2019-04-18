<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;

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

    protected $dates = ['deleted_at'];

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
