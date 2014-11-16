@extends('template.main')

@section('content')
<section id="slider" ><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center">{{$product->name}}</h2>
						<div class="single-blog-post">
							<h3>Category : <a href="{{URL::Route('departments')}}/{{$product->department}}">{{$product->department}}</a></h3>
							
							<div class="post-meta">
								
								<span>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-half-o"></i>
								</span>
							</div>
							
								@if(file_exists(public_path().'/images/product/product_'.$product->product_id.'.png'))
									<img src="{{URL::asset('images/product/product_'.$product->product_id.'.png')}}" style="max-width:100%;max-height:300px;" alt="">
								@else
									<blockquote>No Image Available</blockquote>
								@endif
							<br>
							<h3>Description</h3>
							<p>
								{{$product->description}}
							</p>
							<h3>Warranty Details</h3>
							<p>
								{{$product->warranty_details}}
							</p>
							<h3>Exchange Policy</h3>
							<p>
								{{$product->exchange_policy}}
							</p>
						</div>
					</div><!--/blog-post-area-->

					
					
					<div class="media commnets">
						<h3> &nbsp;Reviews</h3>
						@foreach($reviews as $review)
						<div class="col-md-12"><hr>
						<div class="media-body">
							<h4 class="media-heading">{{$review->name}}</h4>
							<p>{{$review->remarks}}</p>
							<b>Rated : {{$review->rate}}</b>
						</div>
						</div>
						@endforeach
						@if(Auth::check())

						<div class="col-md-12">
						<hr>
							<div class="media-body">
							<form method="post" action="{{URL::Route('product.review')}}">
								<input type="hidden" name="product_id" value="{{$product->product_id}}">
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
					
						@else
							<blockquote><a href="{{URL::Route('user.login')}}">Login</a> to add review</blockquote>
						@endif
					</div><!--Comments-->
					
				</div>
				<div class="col-md-3">
					<div class="left-sidebar">
						<h2>Other Product</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							@foreach($others as $key => $show)
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="{{URL::Route('product')}}/{{$show->product_id}}">{{$show->name}}</a></h4>
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