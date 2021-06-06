<img class="card-img-top" style="border-radius: 50%;"  id="showImage" src="{{ (!empty($user->profile_photo_path ))? url('upload/user_images/'.$user->profile_photo_path) :url('upload/no_image.jpg') }}"width="100p%" height="100p%"><br>
           <ul class="list-group list-group-flush">
            <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
            <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
            <a href="{{ route('change.password') }}" class="btn btn-primary btn-sm btn-block">Change Password</a> 
            <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
           </ul>