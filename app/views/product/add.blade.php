@extends('template.main')

@section('content')
<section id="slider" ><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2">
					<div class="login-form"><!--login form-->
						<h2>Enter new product in {{$shop->name}}  ?
						<br>
						<p style="font-size:15px;margin-yop:-5px;">Enter new product in your shop</p>
						</h2>
						
						<form  method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<label>Chose Department</label>
								<select name="department">
									<?php $depart = Department::get() ;?>
									@foreach($depart as $dept)
										<option>{{$dept->department}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Name of Product</label>
								<input type="text" placeholder="Input name of product" name="name" value="{{ Input::old('name') }}" required/>
							</div>
							
							<div class="form-group">
								<label>Price (in Rs)</label>
								<input type="number" placeholder="Input price" name="price"  required/>
							</div>
							<div class="form-group">
								<label>Quantity Available</label>
								<input type="number" placeholder="" name="quantity" value="0" required/>
							</div>
							<div class="form-group">
								<label>Product Description</label>
								<textarea  placeholder="" name="description" required></textarea>
							</div>
							<div class="form-group">
								<label>Exchange Policy</label>
								<textarea  placeholder="" name="exchange_policy" required></textarea>
							</div>
							<div class="form-group">
								<label>Warranty Details</label>
								<textarea  placeholder="" name="warranty_details" required></textarea>
							</div>
							<div class="form-group">
								<label>Enter an Image of your Product</label>
								<input type="file" name="image" accept="image/*" required/>
							</div>
							<button type="submit" class="btn btn-default">Add</button>
						</form>
					</div><!--/login form-->
				</div>
			</div>
		</div>
	</section><!--/form-->


@endsection