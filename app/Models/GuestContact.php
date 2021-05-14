<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestContact extends Model
{
    use HasFactory;
    protected $table = 'lien_he_kh';

    protected $appends = [
        'rep_mail',
    ];

    public function nguoiTao()
    {
        return $this->hasOne('App\Models\Guest','id','nguoi_tao');
    }

    public function getRepMailAttribute()
    {
        return RepMail::where('tra_loi',$this->id)->get();
    }
}
