@extends('admin.admin_master')
@section('admin')


  <!-- Content Wrapper. Contains page content -->

	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<!-- Main content -->
		<section class="content">
		  <div class="row">



			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Post List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
							
								<th>Post Title English</th>					
								<th>Post Title French </th>
								<th>Post Category </th>	
								<th>Post Image </th>								
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
	 @foreach($posts as $item)
	 <tr>		
		<td>{{ $item->post_title_en }}</td>
		<td>{{ $item->post_title_fr }} </td>
		<td>{{ $item->category_name_en }}</td>
		<td> <img src="{{ URL::to($item->post_image) }}" style="height:50px;width:50px;"></td>
		<td width="30%">
 <a href="" class="btn btn-primary" title="Post Details Data"><i class="fa fa-eye"></i> </a>

 <a href="{{ route('post.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>

 <a href="{{ route('post.delete',$item->id) }}" class="btn btn-danger" title="Delete Data" id="delete">
 	<i class="fa fa-trash"></i></a>
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
			<!-- /.col -->





		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->

	  </div>




@endsection