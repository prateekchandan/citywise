@extends('template.main')

@section('content')
<section id="slider" ><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center">{{$shop->name}}</h2>
						<div class="single-blog-post">
							<h3>Owner : <a href="user">{{$user->name}}</a></h3>
							@if(Auth::check())
							@if($user->id==Auth::user()->id || Auth::user()->id==1)
							<a class="btn btn-default btn-success" href="{{URL::Route('shop')}}/{{$shop->shop_id}}/product/add"><i class="fa fa-plus"></i> Add new product</a>
							@endif
							@endif
							<a class="btn btn-default btn-info" href="{{URL::Route('shop')}}/{{$shop->shop_id}}/products"><i class="fa fa-search"></i>View all products</a>
							<div class="post-meta">
								
								<span>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-half-o"></i>
								</span>
							</div>
							
								@if(file_exists(public_path().'/images/shop/shop_'.$shop->shop_id.'.png'))
									<img src="{{URL::asset('images/shop/shop_'.$shop->shop_id.'.png')}}" style="max-width:100%;max-height:300px;" alt="">
								@else
									<blockquote>No Image Available</blockquote>
								@endif
							<br>
							<h3>Address:</h3>
							<address><b>
								{{$shop->address}} ,
								<br>{{$shop->locality}} , 
								<br>{{$shop->city}}
							</address></b>
						</div>
					</div><!--/blog-post-area-->

					
					
					<div class="media commnets">
						<h3>Reviews</h3>
						@foreach($reviews as $review)
						<div class="col-md-12"><hr>
						<div class="media-body">
							<h4 class="media-heading">{{$review->name}}</h4>
							<p>{{$review->remarks}}</p>
						</div>
						</div>
						@endforeach
						<div class="col-md-12">
							<div class="media-body">
							<form method="post" action="{{URL::Route('shop.review')}}">
								<input type="hidden" name="shop_id" value="{{$shop->shop_id}}">
								<div class="form-group">
									<label>Leave your reviews</label>
									<textarea name="remarks" required></textarea>
								</div>
								<div class="form-group">
									<label>Rate : </label>
									<input type = "radio" name="rate" value="1"> 1 &nbsp;
									<input type = "radio" name="rate" value="2"> 2 &nbsp;
									<input type = "radio" name="rate" value="3"> 3 &nbsp;
									<input type = "radio" name="rate" value="4"> 4 &nbsp;
									<input type = "radio" name="rate" value="5"> 5 &nbsp;
								</div>
								<button class="btn btn-default"> Submit</button>
							</form>
							</div>
						</div>
						@if(Auth::check())
						
						@else
							<blockquote><a href="{{URL::Route('user.login')}}">Login</a> to add review</blockquote>
						@endif
					</div><!--Comments-->
					
				</div>
				<div class="col-md-3">
					<div class="left-sidebar">
						<h2>Other shops</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							@foreach($shops as $key => $show)
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="{{URL::Route('shop')}}/{{$show->shop_id}}">{{$show->name}}</a></h4>
								</div>
							</div>
							@endforeach
							
						</div><!--/category-products-->
					
			
					</div>
					
				</div>
			</div>

		</div>
	</section><!--/form-->

@endsection