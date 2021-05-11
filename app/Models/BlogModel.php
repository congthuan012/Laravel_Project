<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'blog';

    protected $appends = [
        'comment_number',
        'comment',
    ];
    public function Author(){
        return $this->hasOne('App\Models\User','id','tac_gia');
    }

    public function BlogType(){
        return $this->hasOne('App\Models\BlogType','id','loai');
    }

    public function getCommentNumberAttribute(){
        return Comment::where('bai_viet_id',$this->id)->count();
    }

    public function getCommentAttribute(){
        return Comment::where('bai_viet_id',$this->id)->get();
    }
}
