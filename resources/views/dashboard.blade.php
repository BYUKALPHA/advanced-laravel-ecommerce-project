@extends('frontend.main_master')
@section('content')
<div class="body-content">
    <div class="container">
      <div class="row">
        <div class="col-md-2" style="border:1px solid grey; padding: 20px;
border-radius:25px;">
<br>
           <img class="card-img-top" style="border-radius: 50%;"  id="showImage" src="{{ (!empty($user->profile_photo_path ))? url('upload/user_images/'.$user->profile_photo_path) :url('upload/no_image.jpg') }}"width="100p%" height="100p%"><br>
           <ul class="list-group list-group-flush">
            <a href="" class="btn btn-primary btn-sm btn-block">Home</a>
            <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
            <a href="{{ route('change.password') }}" class="btn btn-primary btn-sm btn-block">Change Password</a> 
            <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
           </ul>
        </div>  
        <div class="col-md-2">
            
        </div> 
        <div class="col-md-6">
            <div class="card">
                <h3 class="text-center"><span class="text-danger">Hi.....</span>
                    <strong>{{ Auth::user()->name }}</strong>Welcome to Oak Cafe</h3>
                
            </div>
            <table class="table table-response" style="border:1px solid grey; padding: 20px;
border-radius:25px;">
                <thead>
                  <tr class="strong">
                    <td scope="col">#</td>
                    <td scope="col">First</td>
                    <td scope="col">Last</td>
                    <td scope="col">Bordy</td>
                </tr>  
                </thead>
                <tbody>
                   <tr>
                    <td scope="col">1</td>
                    <td scope="col">Alpha</td>
                    <td scope="col">Byuku</td>
                    <td scope="col">Body element</td>
                </tr>  
                 <tr>
                    <td scope="col">2</td>
                    <td scope="col">Alpha</td>
                    <td scope="col">Byuku</td>
                    <td scope="col">Body element</td>
                </tr>
                 <tr>
                    <td scope="col">3</td>
                    <td scope="col">Alpha</td>
                    <td scope="col">Byuku</td>
                    <td scope="col">Body element</td>
                </tr> 
                </tbody>

            </table>
        </div> 
      </div>  
    </div>
    
</div>

@endsection