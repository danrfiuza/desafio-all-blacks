<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uf extends Model
{
    public $timestamps = true;
    public $table = 'ufs';
    protected $primaryKey = 'uf';
    public $incrementing = false;
    protected $hidden = [
        '_token',
    ];

    public function cidades()
    {
        return $this->hasMany(Cidade::class,'uf','uf');
    }
}
