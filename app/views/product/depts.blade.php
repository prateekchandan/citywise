@extends('template.main')

@section('content')
<section id="slider" ><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-md-12" id="tshirt">
					<h2 class="title text-center">Browse By Departments</h2>
					@foreach($depts as $key => $dept)
						@if($key%4==0)
						<div class="row">
						@endif
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												
												<h2>{{$dept->department}}</h2>

												<a href="{{URL::Route('departments')}}/{{$dept->department}}" class="btn btn-default add-to-cart"><i class="fa fa-angle-double-right"></i>Browse</a>
											</div>
											
										</div>
									</div>
								</div>
						@if(($key+1)%4==0)
						</div>
						@endif
					@endforeach
					@if(sizeof($depts)%4!=0)
					</div>
					@endif

				</div>
			</div>
		</div>
	</section><!--/form-->

@endsection