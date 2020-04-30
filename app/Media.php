<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    public static function getAll(){//หน้าแสดงรายการกิจกรรม
        return DB::table('media')
       
        ->get();
    }
    public static function postMe($data){//เพิ่มกิจกรรม
        return DB::table('media')
        ->insert($data); //
    }
    public static function getAll_Smart2($id){//หน้าแสดงรายการกิจกรรมหน้า เพิ่มเติม
        return DB::table('media')
        ->where('media_id',$id)//แสดงรายละเอียดของแต่ละกิจกรรม
        ->get();
    }
    public static function add_point($data,$id,$med){
        DB::table('media_users')
        ->insert($data);

        return DB::table('media_users')
        ->where('user_id',$id)
        ->where('media_id',$med)
        ->get();

    }
    public static function select($id)//แก้ไขกิจกรรม
    {
        return DB::table('media')
        ->where('media_id',$id)
        ->first();
    }
    public static function updateMe($data,$media_id)//อัพเดตกิจกรรม

    {
      
        return DB::table('media')
        ->where('media_id',$media_id)
        ->update($data);
    }
    public static function del($id){//ลบการลงทะเบียน
        return DB::table('media')
        ->where('media_id',$id)
        ->delete();
    }
}
