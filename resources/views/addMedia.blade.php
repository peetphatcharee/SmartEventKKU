@extends('layouts.app')

<html>
    <head>
    </head>
<body>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('เพิ่มกิจกรรม') }}</div>

                <div class="card-body">
                    <form method="post" enctype="multipart/form-data" action="submit_form"  >
                        
                    @csrf
                    <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">กิจกรรม :</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" 
                                name="media_name"  value="" required autofocus>
                            </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">อัพโหลดวิดีโอ :</label>
                        <div class="col-md-6">
                        <div class="custom-file">
                          <input type="file" class="{{ $errors->has('name') ? ' is-invalid' : '' }}"  name="media_file" >
                         
                        </div>
                    </div>
                    </div>

                    <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">เวลาวิดีโอ</label>

                            <div class="col-md-6">
                                <input id="duration" placeholder="0.00" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="media_time"  value="" required autofocus 
                                >
                            </div>
                           
                    </div>

                    <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">จำนวนหน่วยกิต</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="media_point"  value="" required autofocus>
                            </div>
                    </div>

                   
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">รายละเอียดเพิ่มเติม</label>

                        <div class="col-md-6">
                            
                            <textarea  id="name" type="text" rows="5" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="media_Description"  value="" required autofocus></textarea>
                        </div>
                </div>

                    <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    บันทึก
                                </button>
                            </div>
                        </div>

                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
</body>

</html>