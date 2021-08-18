@extends('admin.admin_master')
@section('admin')


@php 
$category = DB::table('categories')->get();
$brand = DB::table('brands')->get();
$subcategory = DB::table('sub_categories')->get();

@endphp
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


	  <div class="container-full">
		<!-- Content Header (Page header) -->




		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Edit Product </h4>
<a href="{{  route('add-item') }}" class="btn btn-success btn-md pull-center">Add Products</a>
<a href="{{  route('all-item') }}" class="btn btn-success btn-md pull-right">All Products</a>

			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

  

<form method="post" action="{{ url('item/data/update/'.$product->id) }}">
			    @csrf

<div class="row">
	<div class="col-12">
<h4 class="box-title">Update Product without photo </h4>
<hr>
<!-- start 1nd row  -->
<div class="row"> 
     <div class="col-md-4">
				 <div class="form-group">
			<h5>Product Name <span class="text-danger">*</span></h5>
			<div class="controls">
			<input type="text" name="product_name" class="form-control" required="" value="{{ $product->product_name }}">
     @error('product_name') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 	  </div>
		</div>
			</div> <!-- end col md 6 -->
       <div class="col-md-4">
		<div class="form-group">
			<div class="form-group">
			<h5>Product Code <span class="text-danger">*</span></h5>
			<div class="controls">
		<input type="text" name="product_code" class="form-control" required="" value="{{ $product->product_code }}">
			     @error('product_code') 
				 <span class="text-danger">{{ $message }}</span>
				 @enderror
	 		 </div>
		     </div>
		   </div>
			</div> <!-- end col md 3 -->
			
			<div class="col-md-4">
	          <div class="form-group">
			<h5>Quantity <span class="text-danger">*</span></h5>
			<div class="controls">
				<input type="text" name="product_quantity" class="form-control" required="" value="{{ $product->product_code }}">
			     @error('product_quantity') 
				 <span class="text-danger">{{ $message }}</span>
				 @enderror
	 	  </div>
		</div>
		</div><!-- end col md 3 -->
		</div> <!-- end 1nd row  -->



 <!-- start 2st row  -->
<div class="row">    

			<div class="col-md-4">
				 <div class="form-group">
	<h5>Category <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="category_id" class="form-control"  required="">
			<option value="" selected="" disabled="">Select Category</option>
			@foreach($category as $row)
<option value="{{ $row->id }}" <?php if ($row->id == $product->category_id){
	echo "selected";} ?> >{{ $row->category_name_en }}</option>
@endforeach
		</select>
		@error('category_id') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	 </div>
		 </div>

			</div> <!-- end col md 4 -->
			<div class="col-md-4">
	 <div class="form-group">
	<h5>SubCategory <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="subcategory_id" class="form-control"  required="">
			<option value="" selected="" disabled="">Select SubCategory</option>
@foreach($subcategory as $row)
<option value="{{ $row->id }}" <?php if ($row->id == $product->subcategory_id){
	echo "selected";} ?> >{{ $row->subcategory_name_en }}</option>
@endforeach
		</select>
		@error('subcategory_id') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	 </div>
		 </div>

			</div> <!-- end col md 4 -->
			 <div class="col-md-4">
	     <div class="form-group">
	       <h5>Brand <span class="text-danger">*</span></h5>
	      <div class="controls">
		<select name="brand_id" class="form-control" required="" >
			<option value="" selected="" disabled="">Select Brand</option>
	@foreach($brand as $row)
<option value="{{ $row->id }}" <?php if ($row->id == $product->brand_id){
	echo "selected";} ?> >{{ $row->brand_name_en }}</option>
@endforeach
		</select>
		@error('brand_id') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	 </div>
		 </div>
			</div> <!-- end col md 4 -->
		</div> <!-- end 2st row  -->


	<!-- start 3RD row  -->	
   <div class="row"> 
			<div class="col-md-4">

				 <div class="form-group">
			<h5>Product Size <span class="text-danger">*</span></h5>
			<div class="controls">
	 <input type="text" name="product_size" class="form-control" data-role="tagsinput" required="" value="{{ $product->product_size }}">
     @error('product_size') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 		 </div>
		</div>
			</div> <!-- end col md 4 -->
				<div class="col-md-4">
	    <div class="form-group">
			<h5>Product Color <span class="text-danger">*</span></h5>
			
	 <input type="text" name="product_color" class="form-control" data-role="tagsinput" required=""value="{{ $product->product_color }}">
     @error('product_color') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 		 </div>
			</div> <!-- end col md 4 -->

			<div class="col-md-4">
	      <div class="form-group">
			<h5>Selling Price <span class="text-danger">*</span></h5>
             <div class="controls">
				<input type="text" name="selling_price" class="form-control" required=""value="{{ $product->selling_price }}">
			     @error('selling_price') 
				 <span class="text-danger">{{ $message }}</span>
				 @enderror
	 		 </div>	
	 		 </div>	
			</div> <!-- end col md 4 -->			

		</div> <!-- end 3RD row  -->


<!-- start 4th row  -->
<div class="row"> 		

  <div class="col-lg-8">
	<div class="form-group">
			<h5>Video Link <span class="text-danger">*</span></h5>
			<div class="controls">
				<input type="text" name="video_link" class="form-control" required=""value="{{ $product->video_link}}">
     @error('video_link') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 	  </div>
		</div>
			</div> <!-- end col md 4 -->

			<div class="col-md-4">
	      <div class="form-group">
			<h5>Discount <span class="text-danger">*</span></h5>
             <div class="controls">
				<input type="text" name="discount_price" class="form-control" value="{{ $product->discount_price}}">
			     @error('discount_price') 
				 <span class="text-danger">{{ $message }}</span>
				 @enderror
	 		 </div>	
	 		 </div>	
			</div> <!-- end col md 4 -->
		</div> <!-- end 5th row  -->




<!-- start 8th row  -->
<div class="row"> 
	<div class="col-lg-12">
	    <div class="form-group">
			<h5>Product Details <span class="text-danger">*</span></h5>
			<div class="controls">
	<textarea id="editor1" name="product_details" rows="10" cols="80" required="" 
	value="{!! $product->product_details !!}"></textarea>  
	 		 </div>
		</div>				 
</div> <!-- col-lg-12  -->
</div> <!-- end 8th row  -->


	 <hr>

	
	</div>
  </div>
	<div class="row">
		<div class="col-md-3">
			<div class="form-group">
				
				<div class="controls">
			<fieldset>
				<input type="checkbox" id="checkbox_2" name="main_slider" value="1" 
<?php if ($product->main_slider == 1) {echo "checked";} ?>	>
				<label for="checkbox_2">Main Slider</label>
			</fieldset>
			<fieldset>
				<input type="checkbox" id="checkbox_3" name="trend" value="1"<?php if ($product->trend == 1) {echo "checked";} ?>>
				<label for="checkbox_3">Trend Product</label>
			</fieldset>
		</div>								
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				
			<div class="controls">
			<fieldset>
				<input type="checkbox" id="checkbox_4" name="hot_deal" value="1"
				<?php if ($product->hot_deal == 1) {echo "checked";} ?>>
				<label for="checkbox_4">Hot Deal</label>
			</fieldset>
			<fieldset>
				<input type="checkbox" id="checkbox_5" name="mid_slider" value="1"
				<?php if ($product->mid_slider == 1) {echo "checked";} ?>>
				<label for="checkbox_5">Mid Slider</label>
			</fieldset>
		</div>
			</div>
		</div>
			<div class="col-md-3">
			<div class="form-group">
				
			<div class="controls">
			<fieldset>
				<input type="checkbox" id="checkbox_6" name="best_rated" value="1"
				<?php if ($product->best_rated == 1) {echo "checked";} ?>>
				<label for="checkbox_6">Best Rated</label>
			</fieldset>
			<fieldset>
				<input type="checkbox" id="checkbox_7" name="hot_new" value="1"
				<?php if ($product->hot_new == 1) {echo "checked";} ?>>
				<label for="checkbox_7">Hot New</label>
			</fieldset>
		</div>
			</div>
		</div>


<div class="col-md-3">
			<div class="form-group">
				
			<div class="controls">
			<fieldset>
				<input type="checkbox" id="checkbox_8" name="buyone_getone" value="1"
				<?php if ($product->buyone_getone == 1) {echo "checked";} ?>>
				<label for="checkbox_8">Buy One get One</label>
			</fieldset>
		
		</div>
			</div>
		</div>


						</div>

						<div class="text-xs-right">
<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Product">
						</div>
					</form>
<form method="post" action="{{ url('item/photo/update/'.$product->id) }}" enctype="multipart/form-data">
	@csrf
	
<hr>
<h4 class="box-title">Update Product photos </h4>
<hr>


<!-- start 6th row  -->
<div class="row"> 
	<div class="col-md-4">
	    <div class="form-group">
			<h5>Image One <span class="text-danger">*</span></h5>
			<div class="controls">	
	<input type="file" name="image_one" class="form-control" onChange="mainThamUrl(this)" >
	
	 <div class="controls">	
	 <input type="hidden" name="old_one" class="form-control" value="{{ $product->image_one }}">
	 <img src="{{ URL::to($product->image_one) }}" style="height:80px;width: 80px;">
	  <img src="" id="mainThmb">
	 		 </div>
     @error('image_one') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 	 <img src="" id="mainThmb">
	 		 </div>
		</div>
			</div> <!-- end col md 4 -->
	<div class="col-md-4">
	    <div class="form-group">
			<h5>Image Two <span class="text-danger">*</span></h5>
			<div class="controls">	
	<input type="file" name="image_two" class="form-control" onChange="mainThamUrl2(this)" >
	 <div class="controls">	
	 	 <input type="hidden" name="old_two" class="form-control" value="{{ $product->image_two }}">
	 <img src="{{ URL::to($product->image_two) }}" style="height:80px;width: 80px;">
	 <img src="" id="mainThmb2">
	 		 </div>
     @error('image_two') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 	 
	 		 </div>
		</div>
			</div> <!-- end col md 4 -->
		<div class="col-md-4">
	    <div class="form-group">
			<h5>Image Three <span class="text-danger">*</span></h5>
			<div class="controls">	
	 <input type="file" name="image_three" class="form-control" onChange="mainThamUrl3(this)" >
	 <div class="controls">	
	 <img src="{{ URL::to($product->image_three) }}" style="height:80px;width: 80px;">
	  <img src="" id="mainThmb3">
	 		 </div>
     @error('image_three') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 	 <img src="" id="mainThmb3">
	 		 </div>
		</div>
			</div> <!-- end col md 4 -->

		</div> <!-- end 6th row  -->
			<div class="text-xs-right">
<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Photo">
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
<script type="text/javascript">
	function mainThamUrl2(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('#mainThmb2').attr('src',e.target.result).width(80).height(80);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}	
</script>
<script type="text/javascript">
	function mainThamUrl3(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('#mainThmb3').attr('src',e.target.result).width(80).height(80);
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