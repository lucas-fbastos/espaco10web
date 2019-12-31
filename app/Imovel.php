<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;  
class Imovel extends Model
{
    protected $tablen= 'imoveis';

    
    public function images()
    {
        return $this->hasMany('App\ImgImovel');
    }

    public function items()
    {
        return $this->hasMany('App\Items');
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y H:i:s');
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y H:i:s');
    }
}

