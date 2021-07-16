@php
$tags_en = App\Models\Product::groupBy('product_tags_en')->select('product_tags_en')->get();
$tags_hin = App\Models\Product::groupBy('product_tags_fr')->select('product_tags_fr')->get();
@endphp 
     
          

            <!-- ====================== PRODUCT TAGS ========================== -->
            <div class="sidebar-widget product-tag wow fadeInUp outer-top-vs">
              <h3 class="section-title">@if(session()->get('language') == 'french') Étiquettes de produits @else Product tags @endif</h3>
              <div class="sidebar-widget-body outer-top-xs">
                <div class="tag-list"> 
                @if(session()->get('language') == 'french') 
@foreach($tags_hin as $tag)
<a class="item active" title="Phone" href="{{ url('product/tag/'.$tag->product_tags_fr) }}">
     {{ str_replace(',',' ',$tag->product_tags_fr)  }}</a> 
@endforeach
 @else 
@foreach($tags_en as $tag)
<a class="item active" title="Phone" href="{{ url('product/tag/'.$tag->product_tags_en) }}">
     {{ str_replace(',',' ',$tag->product_tags_en)  }}</a> 
@endforeach
  @endif </div>    <!-- /.tag-list --> 
              </div>      <!-- /.sidebar-widget-body --> 
            </div>        <!-- /.sidebar-widget --> 




