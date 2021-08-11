@extends('admin.admin_master')
@section('admin')

@php
$blogcategory = DB::table('post_categories')->get();
@endphp

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	  <div class="container-full">
		<!-- Content Header (Page header) -->

		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Update Post </h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
<form method="post" action="{{ url('blog/post/update/'.$post->id) }}" enctype="multipart/form-data" >
			    @csrf

<div class="row">
	<div class="col-12">
		<div class="row"> <!-- start 1st row  -->
			<div class="col-md-6">
	 <div class="form-group">
	<h5>Post Category <span class="text-danger">*</span></h5>
	<div class="controls">
		
		<select name="category_id" class="form-control"  >
			<option value="" selected="" disabled="">Select Category</option>
			@foreach($blogcategory as $row)
			<option value="{{ $row->id }}"
               <?php if($row->id == $post->category_id){
                echo "selected";} ?> >
				{{ $row->category_name_en }}</option>	
			@endforeach
		</select>
		@error('category_id') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	 </div>
		 </div>
			</div> <!-- end col md 6 -->
	<div class="col-md-6">
	    <div class="form-group">
			<h5>Post Title English <span class="text-danger">*</span></h5>
			<div class="controls">
			 <input type="text" name="post_title_en" class="form-control" value="{{ $post->post_title_en }}">
		     @error('post_title_en') 
			 <span class="text-danger">{{ $message }}</span>
			 @enderror
	 		 </div>
		      </div>
			</div> <!-- end col md 6 -->


	
		</div> <!-- end 1st row  -->




<div class="row"> <!-- start 6th row  -->
	<div class="col-md-6">
	    <div class="form-group">
			<h5>Post Title French <span class="text-danger">*</span></h5>
			<div class="controls">
			 <input type="text" name="post_title_fr" class="form-control" value="{{ $post->post_title_fr }}">
		     @error('post_title_fr') 
			 <span class="text-danger">{{ $message }}</span>
			 @enderror
	 		 </div>
		      </div>
			</div> <!-- end col md 6 -->

		<div class="col-md-3">
	    <div class="form-group">
			<h5>Post Image <span class="text-danger">*</span></h5>
			<div class="controls">	
			 <input type="file" name="post_image" class="form-control" onChange="mainThamUrl(this)">
		     @error('post_image') 
			 <span class="text-danger">{{ $message }}</span>
			 @enderror
	 	 <img src="" id="mainThmb">
	 		 </div>
		</div>
			</div> <!-- end col md 3 -->

<div class="col-md-3">
	    <div class="form-group">
			<h5>Old Post Image <span class="text-danger">*</span></h5>
			<div class="controls">	
			<img src="{{ URL::to($post->post_image) }}" style="height:80px; width: 130px;">
			<input type="hidden" name="old_image" value="{{ $post->post_image }}">
	 		 </div>
		</div>
			</div> <!-- end col md 3 -->

		</div> <!-- end 6th row  -->

         <div class="row"> <!-- start 8th row  -->
			<div class="col-md-6">
	          <div class="form-group">
			<h5>Post Details English <span class="text-danger">*</span></h5>
			<div class="controls">
			<textarea id="editor1" name="details_en" rows="10" cols="80" >
				{!! $post->details_en !!}
			</textarea>  
	 		 </div>
		        </div>
			</div> <!-- end col md 6 -->
			<div class="col-md-6">
	     <div class="form-group">
			<h5>Post Details French <span class="text-danger">*</span></h5>
			<div class="controls">			
			<textarea id="editor2" name="details_fr" rows="10" cols="80" >
				{!! $post->details_fr !!}
			</textarea>       
	 		 	 </div>
		</div>		

			</div> <!-- end col md 6 -->		 

		</div> <!-- end 8th row  -->

	 <hr>	
	</div>
  </div>

		<div class="text-xs-right">
       <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Post">
       </div>
	</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
		<!-- /.content -->
	  </div>



<script type="text/javascript">
      $(document).ready(function() {
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{  url('/category/subcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                    	$('select[name="subsubcategory_id"]').html('');
                       var d =$('select[name="subcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });

$('select[name="subcategory_id"]').on('change', function(){
            var subcategory_id = $(this).val();
            if(subcategory_id) {
                $.ajax({
                    url: "{{  url('/category/sub-subcategory/ajax') }}/"+subcategory_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="subsubcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name_en + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });

    });
    </script>

<script type="text/javascript">
	function mainThamUrl(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('#mainThmb').attr('src',e.target.result).width(80).height(80);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}	
</script>


<script>
 
  $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
   
  </script>

@endsection