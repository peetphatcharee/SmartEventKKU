<?php

namespace App\Http\Controllers;
use App\Media as Me;
use App\Media as Storage;
use Owenoj\LaravelGetId3\GetId3;
use Illuminate\Support\Facades\Auth;
use DB;

use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function getMedia(){//แสดงรายการคอร์ส
       
        $Me = Me::getAll();
        
    	$data = array('Me'=>$Me); 
		return view('MediaList',$data);
    		

    }
    public function getForm()
    {
   
        return view('addMedia');//ไปหน้าฟอร์มเเอดเเละดึงดาต้าไปด้วย
	}
    public function postForm(Request $req)//เพิ่มกิจกรรม
    {
        // dd('ok');
        $media_name = $req->input("media_name");
        $video = $req->file("media_file")->store('video','public');

        $data = array("media_name"=>$req->input("media_name"),
		"media_file"=>$video,
		"media_time"=>$req->input("media_time"),
		"media_point"=>$req->input("media_point"),
        "media_Description"=>$req->input("media_Description"),
        "media_view"=>$req->input("media_view",0));
        $insert = Me::postMe($data);
        return redirect('MediaList');
    }
    public function getSmart(){//หน้าแสดงรายการกิจกรรมของ นศ

        if(Auth::user()->is_admin == 1){
            return redirect('MediaList');
        
        
       
    }
        $Me = Me::getAll();

        $user_id = Auth::user()->id;
        $point = DB::table('media_users')
        ->where('user_id',$user_id)
        ->where('status',1)
        ->join('media','media_users.media_id','media.media_id')
        // ->select('media_point')
        ->sum('media_point');

      
         $data = array('Me'=>$Me,
        'point'=>$point); 
		return view('show_smart',$data);

    }
    public function getSmart2($id){//หน้าแสดงรายการกิจกรรม 2 เพิ่มเติม

		// dd('fghjhgf');
		$Me = Me ::getAll_Smart2($id);//แสดงรายละเอียดของแต่ละกิจกรรม 
		   
		 $data = array('Me'=>$Me);     	
		return view('detail_smart',$data);
    }

    public function addPoint($id){

        $media_view = DB::table('media')//ยอดวิว
        ->where('media_id',$id)
        ->value('media_view');
        
        $media_view = $media_view+1;//ยอดวิวอัพเดท
        DB::table('media') 
        ->where('media_id',$id)
        ->update(['media_view'=>$media_view]);

        $user_id = Auth::user()->id;//เพิ่มหน่วยกิต
        $point = DB::table('media_users')
        ->where('user_id',$user_id)
        ->where('media_id',$id)
        ->get();
    //    / return 1;
        if(count($point) == 0){
            $data = array('user_id'=>$user_id,
            'media_id'=>$id,
            'status'=>0);
            $point = Me::add_point($data,$user_id,$id);

        }

        
        return $point[0]->mu_id;


    }

    public function updatePoint($id){//อัพเดตหน่วยกิต
        $user_id = Auth::user()->id;
        DB::table('media_users')
        ->where('user_id',$user_id)
        ->where('media_id',$id)
        ->update(['status'=>1]);
        return "ok";

    }
    public function getEdit($id) //แก้ไขกิจกรรม
    {
		// dd($data);
        $media = Me::select($id);
        // // $type = Ac::getType();
        $data = array('media'=>$media ,
				   );
		//dd($data)
        return view('edit_media',$data);//ไปหน้าฟอร์มเเอดเเละดึงดาต้าไปด้วย
       
    }
    public function updateForm(Request $req) //ทำการอัพเดตกิจกรรม
    {
        //dd($data);
        $media_name = $req->input("media_name");
        $video = $req->file("media_file")->store('video','public');
        
		$media_id = $req->input('media_id');
        $media_name = $req->input('media_name');
		$media_file = $video;
		$media_time = $req->input("media_time");
		$media_point = $req->input("media_point");
        $media_Description = $req->input("media_Description");
        $media_view = $req->input("media_view",0);

        $data = array("media_id"=>$media_id,
					"media_name"=>$media_name,		
                    "media_file"=>$media_file,
                    "media_time"=>$media_time,
					"media_point"=>$media_point,
					"media_Description"=>$media_Description,
					"media_view"=>$media_view);


        $insert = Me::updateMe($data,$media_id);
        return redirect('MediaList');
    }
    
}
