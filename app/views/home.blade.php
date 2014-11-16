@extends('template.main')

@section('content')

	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>CITY</span> 'WISE'</h1>
									<h2>Shop like never Before</h2>
									<p>We present the best pysical shopping experience to you. Browse the shops in your city and chose the best for you</p>
									<a href="{{URL::Route('shops')}}" class="btn btn-default get">Browse shops in your city</a>
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl1.jpg" class="girl img-responsive" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>CITY</span> 'WISE'</h1>
									<h2>Get the power of shopping with you</h2>
									<p>You can now look at your required products in your city by browsing through various departments</p>
									<a href="{{URL::Route('departments')}}" class="btn btn-default get">Browse multiple departments</a>
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl2.jpg" class="girl img-responsive" alt="" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>CITY</span> 'WISE'</h1>
									<h2>Get the best near you</h2>
									<p>Search For the products closest from you. Enter your locality and we will tell your best products near you</p>
									<a href="{{URL::Route('vincity')}}" class="btn btn-default get">Browse by place</a>
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl3.jpg" class="girl img-responsive" alt="" />
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	

@endsection