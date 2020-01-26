<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categori;

class Artikel extends Model
{
    protected $table="table_artikel";
    protected $guarded=['id']; //id yang ga boleh di isi memakai guarded

    public function kategori()
    {
        return $this->belongsTo(\App\Categori::class, 'categories_id', 'id');
    }

    public function getRouteKeyName()
    {
        return 'judul';
    }
}
