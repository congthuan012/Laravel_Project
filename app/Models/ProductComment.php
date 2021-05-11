<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductComment extends Model
{
    use HasFactory;

    protected $table = 'danh_gia_san_pham';

    public function nguoiDanhGia()
    {
        return $this->hasOne('App\Models\Guest','id','nguoi_dung_id');
    }
}
