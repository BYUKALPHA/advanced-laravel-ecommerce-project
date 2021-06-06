@extends('frontend.main_master')
@section('content')


<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{ URL('/') }}">Home</a></li>
                <li class='active'>Reset Password</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="sign-in-page">
            <div class="row">
                <!-- Sign-in -->            
<div class="col-md-6 col-sm-6 sign-in">
    <h4 class="">Reset Password</h4>

  
   <form method="POST" action="{{ route('password.update') }}">
            @csrf
    <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1"
            >Email Address <span>*</span></label>
            <input class="form-control unicase-form-control text-input" id="email" type="email" name="email" :value="old('email', $request->email)" required autofocus />
        </div>
         <div class="form-group">
            <label class="info-title" for="exampleInputEmail1"
            >Password <span>*</span></label>
            <input class="form-control unicase-form-control text-input" id="password" type="password" name="password" required autocomplete="new-password" />
        </div>
         <div class="form-group">
            <label class="info-title" for="exampleInputEmail1"
            >Password Confirmation <span>*</span></label>
            <input class="form-control unicase-form-control text-input" id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"/>
        </div>
    
        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Reset Password</button>
    </form>                 
</div>
<!-- Sign-in -->


    
</div>  
<!-- create a new account -->           </div><!-- /.row -->
        </div><!-- /.sigin-in-->


          @include('frontend.body.brands')
    
</div><!-- /.logo-slider -->
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->    </div><!-- /.container -->
</div><!-- /.body-content -->


@endsection