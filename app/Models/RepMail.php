<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepMail extends Model
{
    use HasFactory;
    protected $table = 'tra_loi_lien_he';
    public function nguoiTraLoi()
    {
        return $this->hasOne('App\Models\Admin','id','nguoi_tra_loi');
    }
}
