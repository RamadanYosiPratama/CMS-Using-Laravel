<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Artikel;

class Categori extends Model
{
    protected $table = 'table_categories'; //memberi tahu kalo protected ngasi tau nama table 
    protected $guarded = ['id']; //kasi tau jangan kasi id karena id sudah ada

    public function setSlugAttribute($value)
    {
        //setiap yang dicantumkan jangan lupa di load
        $this->attributes['slug'] = Str::slug($value, '-');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function Artikel()
    {
        return $this->hasMany(\App\Artikel::class,'categories_id','id');
    }

}
