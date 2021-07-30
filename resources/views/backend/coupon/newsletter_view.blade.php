 @extends('admin.admin_master')
 @section('admin')

<div class="container-full">

 

<!-- Main content -->
        <section class="content">

  <div class="row">
<div class="col-9">

 <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Newsletter List</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead style="color:yellow;">
                            <tr>
                                <th>No</th>
                                <th>Email</th>
                                     <th>Subscribing Time</th>
                                 <th>Action</th>

                                
                              
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($newsletter as $key=>$item)
                            <tr>
                                

<td>
                          

                      <div class="checkbox">
                          <input type="checkbox" >
                          <label >{{ $key+1 }}</label>
                      </div>





</td>

                                <td>{{ $item->email }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->created_at)->diffForhumans()  }}</td>
                          
                              
                          
                              <td>
                                    <a href="{{ route('newsletter.edit',$item->id) }}" class="btn btn-info"><i class="fa fa-pencil" title="Edit Data"></i></a>
                                     <a href="{{ route('newsletter.delete',$item->id) }}" class="btn btn-danger" id="delete"><i class="fa fa-trash"title="Delete Data"></i></a>
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
                  <h3 class="box-title">Add Email</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                      
<form method="post" action="{{ route('newsletter.store') }}" >
                        @csrf
                      <div class="row">
                        <div class="col-12">


                        
                            <div class="form-group">
                                <h5>Email<span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="text" name="email" class="form-control" >
                                @error('email')
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