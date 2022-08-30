<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;
      public $timestamps =false;
    protected $fillable=['truyen_id','tieude','slug_chapter','tomtat','noidung','tinhtrang'];
    protected $primarykey='id';//nếu khác id phải khai báo
    protected $table ='chapter';
    public function truyen(){
     return $this->belongsTo('App\Models\Truyen');}

}
