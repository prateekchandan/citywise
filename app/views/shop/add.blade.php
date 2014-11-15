@extends('template.main')

@section('content')
<section id="slider" ><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2">
					<div class="login-form"><!--login form-->
						<h2>Are you a Shop Owner ?
						<br>
						<p style="font-size:15px;margin-yop:-5px;">Register with us to get your product list updated and get full priviledges of city 'wise'</p>
						</h2>
						@if ($errors->has('login.error'))
							<div class="alert alert-error alert-dismissable" style="background-color:#ffbbbb" role="alert">
							<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
							</button>
							{{ $errors->first('login.error') }}
							</div>
						@endif
						<form action="{{URL::Route('shop.add')}}" method="POST" enctype="multipart/form-data" onsubmit="return fill_pos();">
							<div class="form-group">
								<label>Name of shop</label>
								<input type="text" placeholder="Input name of shop" name="name" value="{{ Input::old('name') }}" required/>
							</div>
							<div class="form-group">
								<label>Where is your shop located ?</label>
								<input type="text" placeholder="Address line 1" name="al1" value="{{ Input::old('al1') }}" required/>
								<input type="text" placeholder="Address line 2" name="al2" value="{{ Input::old('al2') }}" />
								<input type="text" placeholder="Locality" name="locality" value="{{ Input::old('locality') }}" />
								<select name="city">
									<?php $city=new City;
										$cities=$city->get();
									?>
									@foreach($cities as $city)
										<option value="{{$city->name}}">{{$city->name}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Contact No</label>
								<input type="text" placeholder="Input phone number" name="phone" value="{{ Input::old('phone') }}" required/>
							</div>
							<div class="form-group">
								<label>Enter an Image of your Shop</label>
								<input type="file" name="image" accept="image/*" required/>
							</div>
							<div class="form-group">
								<label>Locate your shop on map</label>
								<span id="lat" style="display:none"></span>
								<span id="lng" style="display:none"></span>
								<input type="hidden" name="lat" id="lati">
								<input type="hidden" name="long" id="longi">
								<div align="center" id="map" style="width: 100%; height: 400px"><br/>
								</div>
							</div>
							<button type="submit" class="btn btn-default">Add</button>
						</form>
					</div><!--/login form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAgrj58PbXr2YriiRDqbnL1RSqrCjdkglBijPNIIYrqkVvD1R4QxRl47Yh2D_0C1l5KXQJGrbkSDvXFA"
      type="text/javascript"></script>
<script type="text/javascript">
	function load(x, y) {
	    if (GBrowserIsCompatible()) {
	        var map = new GMap2(document.getElementById("map"));
	        //  map.addControl(new GSmallMapControl());
	        // map.addControl(new GMapTypeControl());
	        var center = new GLatLng(x, y);
	        map.setCenter(center, 15);
	        geocoder = new GClientGeocoder();
	        var marker = new GMarker(center, {
	            draggable: true
	        });
	        map.addOverlay(marker);
	        document.getElementById("lat").innerHTML = center.lat().toFixed(5);
	        document.getElementById("lng").innerHTML = center.lng().toFixed(5);

	        GEvent.addListener(marker, "dragend", function() {
	            var point = marker.getPoint();
	            map.panTo(point);
	            document.getElementById("lat").innerHTML = point.lat().toFixed(5);
	            document.getElementById("lng").innerHTML = point.lng().toFixed(5);

	        });


	        GEvent.addListener(marker, "dragend", function() {
	            var point = marker.getPoint();
	            map.panTo(point);
	            document.getElementById("lat").innerHTML = point.lat().toFixed(5);
	            document.getElementById("lng").innerHTML = point.lng().toFixed(5);

	        });

	    }
	}

	function showAddress(address) {
	    var map = new GMap2(document.getElementById("map"));
	    //  map.addControl(new GSmallMapControl());
	    //  map.addControl(new GMapTypeControl());
	    if (geocoder) {
	        geocoder.getLatLng(
	            address,
	            function(point) {
	                if (!point) {
	                    alert(address + " not found");
	                } else {
	                    document.getElementById("lat").innerHTML = point.lat().toFixed(5);
	                    document.getElementById("lng").innerHTML = point.lng().toFixed(5);
	                    map.clearOverlays()
	                    map.setCenter(point, 14);
	                    var marker = new GMarker(point, {
	                        draggable: true
	                    });
	                    map.addOverlay(marker);

	                    GEvent.addListener(marker, "dragend", function() {
	                        var pt = marker.getPoint();
	                        map.panTo(pt);
	                        document.getElementById("lat").innerHTML = pt.lat().toFixed(5);
	                        document.getElementById("lng").innerHTML = pt.lng().toFixed(5);
	                    });


	                    GEvent.addListener(map, "moveend", function() {
	                      
	                        GEvent.addListener(marker, "dragend", function() {
	                            var pt = marker.getPoint();
	                            map.panTo(pt);
	                            document.getElementById("lat").innerHTML = pt.lat().toFixed(5);
	                            document.getElementById("lng").innerHTML = pt.lng().toFixed(5);
	                        });

	                    });

	                }
	            }
	        );
	    }
	}
	load(78,22);
	showAddress("{{Session::get('city')}}");

	function fill_pos(){
		$("#lati").val($("#lat").html());
		$("#longi").val($("#lng").html());
	}
</script>

@endsection