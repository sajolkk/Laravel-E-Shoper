
@if($all_random=DB::table('products')
            ->join('add_category', 'products.category_id', '=', 'add_category.category_id')
            ->join('manufacture', 'products.manufacture_id', '=', 'manufacture.manufacture_id')
            ->select('products.*', 'add_category.category_name', 'manufacture.manufacture_name')
            ->where('products.publication_status', 1)
            ->inRandomOrder()
            ->limit(9)
            ->get())


<div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">recommended items</h2>
    
    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
        	@foreach($all_random as $data)
	            <div class="item {{ $loop->first ? 'active' : '' }}"> 
	              
	                <div class="col-sm-4">
	                    <div class="product-image-wrapper">
	                        <div class="single-products">
	                            <div class="productinfo text-center">
	                                <img src="{{ URL::to($data->product_image)}}" alt="" />
	                                <h2>$56</h2>
	                                <p>Easy Polo Black Edition</p>
	                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
	                            </div>
	                            
	                        </div>
	                    </div>
	                </div>
	               
	            </div>
            @endforeach
        </div>
         <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
          </a>
          <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
          </a>          
    </div>
</div><!--/recommended_items-->

@endif

