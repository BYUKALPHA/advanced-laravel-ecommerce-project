@extends('frontend.main_master')
@section('content')


<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class='active'>Login</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="sign-in-page">
            <div class="row">
                <!-- Sign-in -->            
<div class="col-md-5 col-sm-5 sign-in offset-lg-1" style="border:1px solid grey; padding: 20px;
border-radius:25px;">
    <h4 class="text-center">Sign in</h4>
   
    <div class="social-sign-in outer-top-xs">
        
    </div>
 <form method="POST" action="{{ isset($guard) ? url($guard.'/login') : route('login') }}">
            @csrf
        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1"
            >Email Address <span>*</span></label>
            <input class="form-control unicase-form-control text-input" id="email" type="email" name="email">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                @enderror
        </div>
        <div class="form-group">
            <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
            <input class="form-control unicase-form-control text-input" id="password" type="password" name="password" >
             @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                @enderror
        </div>
        <div class="radio outer-xs">
            <label>
                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Remember me!
            </label>
            <a href="{{ route('password.request') }}" class="forgot-password pull-right">Forgot your Password?</a>
        </div>
        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
    </form>  
<br>
<a href="{{ route('password.request') }}">I forgot my password</a><br><br>
<button type="submit" class="btn btn-primary btn-block"><i class="fab fa-facebook-square"></i>
Login with Facebook</button>
<button type="submit" class="btn btn-danger btn-block"><i class="fab fa-google"></i>
Login with Google</button>




</div>
<!-- Sign-in -->



<!-- create a new account -->
<div class="col-md-5 col-sm-5 create-new-account offset-lg-1" style="border:1px solid grey; padding: 20px;
border-radius:25px;">
    <h4 class="checkout-subtitle text-center">Create a new account</h4>
  
  <form method="POST" action="{{ route('register') }}">
            @csrf
          <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Full Name <span>*</span></label>
            <input  class="form-control unicase-form-control text-input" id="name"  type="text" name="name" :value="old('name')"  autofocus autocomplete="name"  >
            @error('name')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
            <input  class="form-control unicase-form-control text-input" id="email" type="email" name="email" :value="old('email')"  />
                @error('email')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
      
        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Phone Number <span>*</span></label>
            <input type="text" class="form-control unicase-form-control text-input" id="phone" name="phone"  :value="old('phone')/>
                @error('phone')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
            <input  class="form-control unicase-form-control text-input"  id="password" type="password" name="password"  autocomplete="new-password" />
                @error('password')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
         <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Confirm Password <span>*</span></label>
            <input  class="form-control unicase-form-control text-input"  id="password_confirmation" type="password"               name="password_confirmation" autocomplete="password_confirmation" />
                @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
    </form>
    
    
</div>  
<!-- create a new account -->           </div><!-- /.row -->
        </div><!-- /.sigin-in-->


          @include('frontend.body.brands')
    
</div><!-- /.logo-slider -->
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->    </div><!-- /.container -->
</div><!-- /.body-content -->


@endsection