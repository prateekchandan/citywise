@extends('template.main')

@section('content')
<section id="slider" ><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2">
					<div class="login-form"><!--login form-->
						<h2>Find your Location
						
							<div class="form-group">
							<label></label>
							<br>
								<span id="lat" style="display:none"></span>
								<span id="lng" style="display:none"></span>
								<input type="hidden" name="lat" id="lati">
								<input type="hidden" name="long" id="longi">
								<div align="center" id="map" style="width: 100%; height: 400px"><br/>
								</div>
							</div>
							<a href="{{URL::Route('demo')}}" type="submit" class="btn btn-default">GO</a>
						
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