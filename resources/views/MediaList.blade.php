@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header" >การจัดการกิจกรรม</div>

                <div class="card-body">
                <div align="right"> <a href="addMedia" class="btn btn-success"><img src="<?php echo asset('img/plus.png' );  ?> " width="20" height="20" >&nbsp;เพิ่มกิจกรรม</a> </div>
                
        <div style="overflow:auto">   
                   <br> <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">รายละเอียดกิจกรรม</th>
                          <th scope="col">จำนวนหน่วยกิต</th>
                         

                         
                         
                          
                         
                          @if (auth::user() != '')
                          <th></th>
                          <th></th>
                          @endif

                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 0; ?>
                        @foreach($Me as $key)
                        <?php $i++?>
              
                        <tr>
                          <th scope="row">{{$i}}</th>
                          <td>
                            <h4>กิจกรรม:&nbsp;{{$key->media_name}}</h4>
                            เวลาวิดีโอ&nbsp;:&nbsp;{{$key->media_time}}
                            <br>
                            <br><video width="200" controls>
                            <source src='<?php echo asset("storage/$key->media_file");  ?>' type="video/mp4">
                                {{$key->media_file}}
                          </video> 
                          
                          <br><img src="<?php echo asset('img/interface.png' );  ?> " width="20" height="20" >&nbsp;<small class="text-muted">&nbsp;{{$key->media_view}}</small>
                            
                          </td>
                         
                         <td ><p class="text-center">{{$key->media_point}}</p></td>
                    
                    
                       
                        <td></td>
                           <td><a href ="edit_media{{$key->media_id }}" class="btn btn-secondary"><img src="<?php echo asset('img/edit.png' );  ?> " width="20" height="20" >&nbsp;แก้ไข</a></td>
                         
                           </tr>
                        @endforeach

                     </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
