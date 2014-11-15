@extends('template.main')

@section('content')
<section id="slider" ><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-md-12" id="tshirt">
					<h2 class="title text-center">Browse Products in {{$shop->name}}</h2>
					@foreach($products as $key => $product)
						@if($key%4==0)
						<div class="row">
						@endif
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												@if(file_exists(public_path().'/images/product/product_'.$product->product_id.'.png'))
												<img src="{{URL::asset('images/product/product_'.$product->product_id.'.png')}}" style="max-width:100%;max-height:300px;" alt="">
												@else
												<img src="{{URL::asset('images/product/default.jpg')}}" alt="">
												@endif
												<h2>{{$product->name}}</h2>
												<p>{{$product->category}}</p>

												<a href="{{URL::Route('product')}}/{{$product->product_id}}" class="btn btn-default add-to-cart"><i class="fa fa-angle-double-right"></i>View Details</a>
											</div>
											
										</div>
									</div>
								</div>
						@if(($key+1)%4==0)
						</div>
						@endif
					@endforeach
					@if(sizeof($products)%4!=0)
					</div>
					@endif

					@if(sizeof($products)==0)
						<blockquote>Oops! No Product in this shop<br>
						If you are a shop owner , please login and register your shop</blockquote>
					@endif
				</div>
			</div>
		</div>
	</section><!--/form-->

@endsection