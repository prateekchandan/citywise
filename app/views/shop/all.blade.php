@extends('template.main')

@section('content')
<section id="slider" ><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-md-12" id="tshirt">
					<h2 class="title text-center">Browse Shops in {{Session::get('city')}}</h2>
					@foreach($shops as $key => $shop)
						@if($key%4==0)
						<div class="row">
						@endif
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												@if(file_exists(public_path().'/images/shop/shop_'.$shop->shop_id.'.png'))
												<img src="{{URL::asset('images/shop/shop_'.$shop->shop_id.'.png')}}" style="max-width:100%;max-height:300px;" alt="">
												@else
												<img src="{{URL::asset('images/shop/default.jpg')}}" alt="">
												@endif
												<h2>{{$shop->name}}</h2>
												<p>{{$shop->locality}}</p>

												<a href="{{URL::Route('shop')}}/{{$shop->shop_id}}" class="btn btn-default add-to-cart"><i class="fa fa-angle-double-right"></i>View Details</a>
											</div>
											
										</div>
									</div>
								</div>
						@if(($key+1)%4==0)
						</div>
						@endif
					@endforeach
					@if(sizeof($shops)%4!=0)
					</div>
					@endif
				</div>
			</div>
		</div>
	</section><!--/form-->

@endsection