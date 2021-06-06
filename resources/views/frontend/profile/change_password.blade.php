@extends('frontend.main_master')
@section('content')
@php
$user = DB::table('users')->where('id',Auth::user()->id)->first();
@endphp
<div class="body-content">
    <div class="container">
      <div class="row">
        <div class="col-md-2">
 <br>
           @include('frontend.body.sidebar')


        </div>  
        <div class="col-md-2">
            
        </div> 
        <div class="col-md-6">
            <div class="card">
                <h3 class="text-center"><span class="text-danger">Hi.....</span>
                    <strong>{{ Auth::user()->name }}</strong>Update your Password</h3>
                    <div class="card-body">
                        <form method="POST" action="{{ route('user.password.update') }}" >
                            @csrf
        <div class="form-group">
        <label class="info-title" for="exampleInputEmail1">Current Password <span>*</span></label>
            <input class="form-control"  id="current_password" type="password" name="oldpassword">
        </div>
        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">New Password <span>*</span></label>
            <input class="form-control"  id="password" type="password" name="password">
        </div>
          <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Confirm Password <span>*</span></label>
            <input class="form-control"  id="password_confirmation" type="password" name="password_confirmation">
        </div>
     
      
         <div class="form-group">
            <button type="submit" class="btn btn-danger btn-sm">Update Password</button>
        </div>
                        </form>
                        
                    </div>
                
            </div>
        </div> 
      </div>  
    </div>
    
</div>

@endsection