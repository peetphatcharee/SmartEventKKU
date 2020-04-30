@extends('layouts.app')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" >รายการกิจกรรม</div>

                <div class="card-body">
                  <div class="text-right"><h2><span class="badge badge-info">{{$point}}</span></h2></div>
              
                
        <div style="overflow:auto">   
                   <br> <table class="table table-hover">
                      <thead>
                        <tr>
                         
                         
                          @if (auth::user() != '')
                         
                          @endif

                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 0; ?>
                        @foreach($Me as $key)
                        <?php $i++?>
              
                        <tr>
                            <div class="card w-90" >
                               
                                  
                                  <div class="w-100 p-3">
                                    
                                    <div class="card-body">
                                      <h3 class="card-text">{{$key->media_name}}</h3>
                                      <p class="card-text">เวลาวิดีโอ&nbsp;:&nbsp;{{$key->media_time}}
                                        <br>จำนวน&nbsp;:&nbsp;{{$key->media_point}}&nbsp;หน่วยกิต
                                        <br><img src="<?php echo asset('img/interface.png' );  ?> " width="20" height="20" >&nbsp;<small class="text-muted">&nbsp;{{$key->media_view}}</small>
                                        
                                    </p>
                                    <a href="detail_smart{{$key->media_id}}" class="btn btn-success">เข้าร่วมกิจกรรม</a>
                               
                            </div>
                          </div>
                        </div>
                                
                      
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

