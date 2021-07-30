 @extends('admin.admin_master')
 @section('admin')

<div class="container-full">

 

<!-- Main content -->
        <section class="content">

  <div class="row">
<div class="col-9">

 <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Coupon List</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead style="color:yellow;">
                            <tr>
                                <th>No</th>
                                <th>Coupon</th>
                                <th>Coupon Discount</th>
                                
                              
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($coupon as $key=>$item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->coupon }}</td>
                                 <td>{{ $item->discount }}%</td>
                              
                          
                              <td>
                                    <a href="{{ route('coupon.edit',$item->id) }}" class="btn btn-info"><i class="fa fa-pencil" title="Edit Data"></i></a>
                                     <a href="{{ route('coupon.delete',$item->id) }}" class="btn btn-danger" id="delete"><i class="fa fa-trash"title="Delete Data"></i></a>
                                </td>
                              
                            </tr>
                            @endforeach
                            </tbody>
                      </table>
                    </div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->

</div>


<!-- ----------------Add category page -->



<div class="col-3">

 <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Add Coupon</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                      
<form method="post" action="{{ route('coupon.store') }}" >
                        @csrf
                      <div class="row">
                        <div class="col-12">


                        
                            <div class="form-group">
                                <h5>Coupon<span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="text" name="coupon" class="form-control" >
                                @error('coupon')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            </div>

           
                            <div class="form-group">
                                <h5>Coupon Discount (%)<span class="text-danger">*</span></h5>
                                      <div class="controls">
                                <input type="text" name="discount" class="form-control" >
                                @error('discount')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            </div>
                                                     
                            


                    
                
                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">
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