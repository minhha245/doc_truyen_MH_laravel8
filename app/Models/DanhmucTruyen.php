<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhmucTruyen extends Model
{
    use HasFactory;
    public $timestamps =false;
    protected $fillable=['tendanhmuc','slug_danhmuc','mota','tinhtrang'];
    protected $primarykey='id';//nếu khác id phải khai báo
    protected $table ='danhmuc';
    public function truyen(){
     return $this->hasMany('App\Models\Truyen');

    }
}
