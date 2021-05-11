<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'binh_luan_bai_viet';

    public function nguoiBinhLuan()
    {
        return $this->hasOne('App\Models\User','id','nguoi_dung_id');
    }
}
