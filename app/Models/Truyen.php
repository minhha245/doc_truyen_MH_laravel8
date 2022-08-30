<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truyen extends Model
{
     use HasFactory;
    public $timestamps =false;
    protected $fillable=['tentruyen','tomtat','danhmuc_id','theloai_id','hinhanh','slug_truyen','tinhtrang'];
    protected $primarykey='id';//nếu khác id phải khai báo
    protected $table ='truyen';
    public function danhmuctruyen(){
     return $this->belongsTo('App\Models\DanhmucTruyen','danhmuc_id','id');

    }
    public function chapter(){
     return $this->hasMany('App\Models\Chapter');

    }
    public function theloai(){
     return $this->belongsTo('App\Models\Theloai','theloai_id','id');

    }
}
