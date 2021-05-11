<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    protected $table = 'sanpham';

    protected $appends = [
        'comment_number',
        'comment',
    ];

    public function productType(){
        return $this->hasOne('App\Models\ProductType','id','maloai');
    }

    public function productSupplier()
    {
        return $this->hasOne('App\Models\Supplier','id','manhacungcap');
    }

    public function getCommentNumberAttribute(){
        return ProductComment::where('san_pham_id',$this->id)->count();
    }

    public function getCommentAttribute(){
        return ProductComment::where('san_pham_id',$this->id)->get();
    }
}
