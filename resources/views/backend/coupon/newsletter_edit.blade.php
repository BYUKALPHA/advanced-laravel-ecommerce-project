 @extends('admin.admin_master')
 @section('admin')

<div class="container-full">

 

<!-- Main content -->
        <section class="content">

  <div class="row">

<!-- ----------------Edit category page -->



<div class="col-8">

 <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Coupon</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                      
       <form method="post" action="{{ route('coupon.update',$coupon->id) }}" >
                        @csrf
                        <input type="hidden" name="id" value="{{ $coupon->id }}">
                          
                      <div class="row">
                        <div class="col-12">


                        
                            <div class="form-group">
                                <h5>Coupon Name<span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="text" name="coupon" class="form-control" value="{{  $coupon->coupon}}">
                                @error('coupon')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            </div>

           
                            <div class="form-group">
                                <h5>Discount<span class="text-danger">*</span></h5>
                                      <div class="controls">
                                <input type="text" name="discount" class="form-control" value="{{  $coupon->discount}}">
                                @error('discount')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            </div>
                                  
                
                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
                        </div>
                            </div>
                    </form>


                    </div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
</div>

</section>

</div>

 @endsection