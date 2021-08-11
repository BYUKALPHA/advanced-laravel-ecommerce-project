@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


	  <div class="container-full">
		<!-- Content Header (Page header) -->




		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Product Show </h4>
<a href="{{  route('add-item') }}" class="btn btn-success btn-md pull-center">Add Products</a>
<a href="{{  route('all-item') }}" class="btn btn-success btn-md pull-right">All Products</a>

			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

  

<form method="" action="" >
			    @csrf

<div class="row">
	<div class="col-12">


<!-- start 1nd row  -->
<div class="row"> 
     <div class="col-md-4">
				 <div class="form-group">
			<h5>Product Name <span class="text-danger">:</span></h5>
			<div class="controls">
			<h5 style="color:yellow">{{$product->product_name}} </h5>
	 	  </div>
		</div>
			</div> <!-- end col md 6 -->
       <div class="col-md-4">
		<div class="form-group">
			<div class="form-group">
			<h5>Product Code <span class="text-danger">:</span></h5>
			<div class="controls">
				<h5 style="color:yellow">{{$product->product_code}} </h5>
	 		 </div>
		     </div>
		   </div>
			</div> <!-- end col md 3 -->
			
			<div class="col-md-4">
	          <div class="form-group">
			<h5>Quantity <span class="text-danger">:</span></h5>
			<div class="controls">
				<h5 style="color:yellow">{{$product->product_quantity}} </h5>
	 	  </div>
		</div>
		</div><!-- end col md 3 -->
		</div> <!-- end 1nd row  -->



 <!-- start 2st row  -->
<div class="row">    

			<div class="col-md-4">
				 <div class="form-group">
	<h5>Category <span class="text-danger">:</span></h5>
	<div class="controls">
		<h5 style="color:yellow">{{$product->category_name_en}} </h5> 
	 </div>
		 </div>

			</div> <!-- end col md 4 -->
			<div class="col-md-4">
	 <div class="form-group">
	<h5>SubCategory <span class="text-danger">:</span></h5>
	<div class="controls">
		<h5 style="color:yellow">{{$product->subcategory_name_en}} </h5>  
	 </div>
		 </div>

			</div> <!-- end col md 4 -->
			 <div class="col-md-4">
	     <div class="form-group">
	       <h5>Brand <span class="text-danger">:</span></h5>
	      <div class="controls">
		<h5 style="color:yellow">{{$product->brand_name_en}} </h5>  
	 </div>
		 </div>
			</div> <!-- end col md 4 -->
		</div> <!-- end 2st row  -->


	<!-- start 3RD row  -->	
   <div class="row"> 
			<div class="col-md-4">

				 <div class="form-group">
			<h5>Product Size <span class="text-danger">:</span></h5>
			<div class="controls">
	<h5 style="color:yellow">{{$product->product_size}} </h5> 
	 		 </div>
		</div>
			</div> <!-- end col md 4 -->
				<div class="col-md-4">
	    <div class="form-group">
			<h5>Product Color <span class="text-danger">:</span></h5>
			
	<h5 style="color:yellow">{{$product->product_color}} </h5> 
	 		 </div>
			</div> <!-- end col md 4 -->

			<div class="col-md-4">
	      <div class="form-group">
			<h5>Selling Price <span class="text-danger">:</span></h5>
             <div class="controls">
				<h5 style="color:yellow">{{$product->selling_price}} </h5> 
	 		 </div>	
	 		 </div>	
			</div> <!-- end col md 4 -->			

		</div> <!-- end 3RD row  -->


<!-- start 4th row  -->
<div class="row"> 		

  <div class="col-lg-8">
	<div class="form-group">
			<h5>Video Link <span class="text-danger">:</span></h5>
			<div class="controls">
			<h5 style="color:yellow">{{$product->video_link}} </h5> 
	 	  </div>
		</div>
			</div> <!-- end col md 4 -->

			<div class="col-md-4">
	      <div class="form-group">
			<h5>Discount <span class="text-danger">:</span></h5>
             <div class="controls">
				<h5 style="color:yellow">{{$product->discount_price}} </h5> 
	 		 </div>	
	 		 </div>	
			</div> <!-- end col md 4 -->
		</div> <!-- end 5th row  -->

<!-- start 6th row  -->
<div class="row"> 
	<div class="col-md-4">
	    <div class="form-group">
			<h5>Image One <span class="text-danger">*</span></h5>
			<div class="controls">	
	<img src="{{ URL::to($product->image_one) }}" style="height:80px;width: 80px;">
	 		 </div>
		</div>
			</div> <!-- end col md 4 -->
	<div class="col-md-4">
	    <div class="form-group">
			<h5>Image Two <span class="text-danger">*</span></h5>
			<div class="controls">	
	 <img src="{{ URL::to($product->image_two) }}" style="height:80px;width: 80px;">
	 		 </div>
		</div>
			</div> <!-- end col md 4 -->
		<div class="col-md-4">
	    <div class="form-group">
			<h5>Image Three <span class="text-danger">*</span></h5>
			<div class="controls">	
	 <img src="{{ URL::to($product->image_three) }}" style="height:80px;width: 80px;">
	 		 </div>
		</div>
			</div> <!-- end col md 4 -->

		</div> <!-- end 6th row  -->



<!-- start 8th row  -->
<div class="row"> 
	<div class="col-lg-12">
	    <div class="form-group">
			<h5>Product Details <span class="text-danger">*</span></h5>
			<div class="controls">
<p>{!! $product->product_details !!}</p>
	 		 </div>
		</div>				 
</div> <!-- col-lg-12  -->
</div> <!-- end 8th row  -->


	 <hr>

	
	</div>
  </div>
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				
				<div class="controls">
			<fieldset>
				<label >Main Slider</label>
				@if($product->main_slider == 1)
				<span class="badge badge-success">Active</span>
				@else
				<span class="badge badge-danger">Inactive</span>
				@endif
				</fieldset>
			<fieldset>
				<label >Trend Product</label>
				@if($product->trend == 1)
				<span class="badge badge-success">Active</span>
				@else
				<span class="badge badge-danger">Inactive</span>
				@endif
			</fieldset>
		</div>								
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				
			<div class="controls">
			<fieldset>				
				<label>Hot Deal</label>
				@if($product->hot_deal == 1)
				<span class="badge badge-success">Active</span>
				@else
				<span class="badge badge-danger">Inactive</span>
				@endif
			</fieldset>
			<fieldset>
				
				<label >Mid Slider</label>
					@if($product->mid_slider == 1)
				<span class="badge badge-success">Active</span>
				@else
				<span class="badge badge-danger">Inactive</span>
				@endif
			</fieldset>
		</div>
			</div>
		</div>
			<div class="col-md-4">
			<div class="form-group">
				
			<div class="controls">
			<fieldset>
				
				<label >Best Rated</label>
				@if($product->best_rated == 1)
				<span class="badge badge-success">Active</span>
				@else
				<span class="badge badge-danger">Inactive</span>
				@endif
			</fieldset>
			<fieldset>
				
				<label >Hot New</label>
					@if($product->hot_new == 1)
				<span class="badge badge-success">Active</span>
				@else
				<span class="badge badge-danger">Inactive</span>
				@endif
			</fieldset>
		</div>
			</div>
		</div>



						</div>

						<div class="text-xs-right">
<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Product">
						</div>
					</form>




	          </div>
				</div>
			  </div>



 	</div> <!-- // end row  -->

 </section>
<!-- ///////////////// End Start Thambnail Image Update Area ///////// -->

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