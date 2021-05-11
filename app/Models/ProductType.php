<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;
    protected $table = 'loaisanpham';
    public function product()
    {
        return $this->hasMany('App\Models\Product','maloai','id');
    }
}
