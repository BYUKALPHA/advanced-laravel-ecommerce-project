@extends('frontend.main_master')
@section('content')
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
                    <strong>{{ Auth::user()->name }}</strong>Update your profile</h3>
                    <div class="card-body">
                        <form method="POST" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">
                            @csrf
            <div class="form-group">
            <label class="info-title" for="exampleInputEmail1"
            >Name <span>*</span></label>
            <input class="form-control"  type="text" name="name" value="{{ $user->name }}">
        </div>
        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1"
            >Email <span>*</span></label>
            <input class="form-control"  type="email" name="email" value="{{ $user->email }}">
        </div>
         <div class="form-group">
            <label class="info-title" for="exampleInputEmail1"
            >Phone <span>*</span></label>
            <input class="form-control"  type="text" name="phone" value="{{ $user->phone }}">
        </div>
         <div class="form-group">
            <label class="info-title" for="exampleInputEmail1"
            >User Image <span>*</span></label>
            <input class="form-control"  type="file" name="profile_photo_path">
        </div>
         <div class="form-group">
            <button type="submit" class="btn btn-danger btn-sm">Update</button>
        </div>
                        </form>
                        
                    </div>
                
            </div>
        </div> 
      </div>  
    </div>
    
</div>

@endsection