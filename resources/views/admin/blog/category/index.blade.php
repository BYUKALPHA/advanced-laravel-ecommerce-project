 @extends('admin.admin_master')
 @section('admin')

<div class="container-full">

 

<!-- Main content -->
        <section class="content">

  <div class="row">
<div class="col-9">

 <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Blog Category List</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead style="color:yellow;">
                            <tr>
                                <th>No</th>
                                <th>Category Engl.</th>
                                <th>Category Fr</th>
                                <th>Action</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($blogcat as $key=>$item)
                            <tr>
                                <td>{{ $key +1 }}</td>
                                <td>{{ $item->category_name_en }}</td>
                                 <td>{{ $item->category_name_fr }}</td>
                              
                          
                              <td>
                                    <a href="{{ route('blog.category.edit',$item->id) }}" class="btn btn-info"><i class="fa fa-pencil" title="Edit Category"></i></a>
                                     <a href="{{ route('blog.category.delete',$item->id) }}" class="btn btn-danger" id="delete"><i class="fa fa-trash"title="Delete Category"></i></a>
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
                  <h3 class="box-title">Add  Blog Category</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                      
<form method="post" action="{{ route('blog_category.store') }}" >
                        @csrf
                      <div class="row">
                        <div class="col-12">


                        
                            <div class="form-group">
                                <h5>Category Name English<span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="text" name="category_name_en" class="form-control" >
                                @error('category_name_en')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            </div>

           
                            <div class="form-group">
                                <h5>Category Name French<span class="text-danger">*</span></h5>
                                      <div class="controls">
                                <input type="text" name="category_name_fr" class="form-control" >
                                @error('category_name_fr')
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