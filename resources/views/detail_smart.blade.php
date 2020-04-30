@extends('layouts.app')
<link href="countdown.css" rel="stylesheet">
<script src="1-countdown.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<style>
  .countdown {
  margin: 0 auto;
  max-width: 350px;
  background: #fff;
  font-family: Impact, Charcoal, sans-serif;
  text-align: center;
}
.countdown .header {
  color: #c61d1d;
  text-align: center;
  font-weight: normal;
  margin: 5px 0 10px 0;
}
.countdown .square {
  display: inline-block;
  padding: 10px;
  margin: 5px;
}
.countdown .digits {
  font-size: 24px;
  background: #fff;
  color: #000;
  padding: 20px 10px;
  border-radius: 5px;
}
/* .countdown .text {
  margin-top: 10px;
  color: #ddd;
} */
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <?php $i = 0; ?>
                        @foreach($Me as $key)
                <div class="card-header">กิจกรรม :{{$key->media_name}}</div>

                <div class="card-body">
               
                <input type="hidden" value="{{$key->media_id}}" name="media_id">
    <div style="overflow:auto">   
                   <br> <table class="table table-hover">
                      <thead>
                        <tr>
                         

                          @if (auth::user() != '')
                          
                          @endif

                        </tr>
                      </thead>
                      <tbody>
                        
                        <?php $i++?>

                        <tr>
                          <div class="card mb-3">

                            
                            <div class="countdown">
                         
                              <div class="square">
                                <div class="digits" id="cd-min">00</div>
                                <div><small class="text-muted">MINUTES</small></div>
                              </div>
                              <div class="square">
                                <div class="digits" id="cd-sec">00</div>
                                <div><small class="text-muted">SECONDS</small></div>
                              </div>
                            </div>    
                            
                                    <video id="myVideos" class="card-img-top" width="600" height="350" >
                                        <source src='<?php echo asset("storage/$key->media_file");  ?>' type="video/mp4">
                                        {{$key->media_file}}</video> 
                                        <br><div class="col-md-4"><button class="btn btn-danger" onclick="playVid()" type="button">
                                          <img src="<?php echo asset('img/play.png' );  ?> " width="15" height="15" >&nbsp;Play Video</button>
                                          &nbsp;&nbsp;<img src="<?php echo asset('img/interface.png' );  ?> " width="20" height="20" >&nbsp;<small class="text-muted">&nbsp;{{$key->media_view}}</small>
                                        </div>
                                        
                                    <div class="card-body">
                                      <h1 class="card-text">{{$key->media_name}}</h1>
                                      <p class="card-text">เวลาวิดีโอ&nbsp;:&nbsp;{{$key->media_time}}
                                        <br>จำนวน&nbsp;:&nbsp;{{$key->media_point}}&nbsp;หน่วยกิต
                                       
                                        <br>รายละเอียด&nbsp;:&nbsp;{{$key->media_Description}}
                                    </p>
                                   
                           
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
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script> 
  var vid = document.getElementById("myVideos"); 
  console.log($('#myVideos'));
  function playVid() { 
    $('#myVideos')[0].play();
    var counter = {};
    var time_video = <?php echo $Me[0]->media_time ?>;
      
      // counter.end = 10;
      counter.end = time_video*60;
    
      // Get the containers
      counter.min = document.getElementById("cd-min");
      counter.sec = document.getElementById("cd-sec");
      var point = <?php echo $Me[0]->media_id ?>;
    
      // Start if not past end date 
      if (counter.end > 0) {
        jQuery.get("add_point"+point, function(mu_id){
                 
        });
        //console.log(mu_id);
        counter.ticker = setInterval(function(){
          // Stop if passed end time
          counter.end--;
          if (counter.end <= 0) { 
            clearInterval(counter.ticker); 
            counter.end = 0;
            

            jQuery.get("update_point"+point, function(data){
                 
            });
            Swal.fire({
              position: 'top-end',
              icon: 'success',
              title: 'ได้รับหน่วยกิตเรียบร้อยแล้ว',
              showConfirmButton: false,
              timer: 1500
            });
          }
    
          // Calculate remaining time
          var secs = counter.end;
          var mins  = Math.floor(secs / 60); // 1 min = 60 secs
          secs -= mins * 60;
    
          // Update HTML
          counter.min.innerHTML = mins;
          counter.sec.innerHTML = secs;
        }, 1000);
        
      }

  } 
  
  function pauseVid() { 
    vid.pause(); 
  } 
  </script> 

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>