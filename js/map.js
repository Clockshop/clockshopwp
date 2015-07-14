(function($) {

	$(document).ready(function() {
   
	  var myLatlng = new google.maps.LatLng(34.106980, -118.253221);
	  var mapOptions = {
	    zoom: 16,
	    center: myLatlng,
	    mapTypeId: google.maps.MapTypeId.SATELLITE
	  };
	  var map = new google.maps.Map(document.getElementById("map_canvas"),
	  mapOptions);
  	
	  	var marker = new google.maps.Marker({
		      	position: myLatlng,
		      	map: map,
		});

	  var boxText = document.createElement("div");
	  boxText.style.cssText = "background: #ffd051; border-radius:200px; width: 200px; height: 75px; padding-top: 65px; padding-bottom: 60px; color:#FFF;  font-family: 'Raleway', sans-serif; font-weight: 400; font-size: 14px; text-align: center";
	  boxText.innerHTML = "2806 Clearwater St. </br> Los Angeles, CA 90039 </br> info@clockshop.org </br> 323.522.6014";
		  var myOptions1 = {
		           content: boxText,
	             disableAutoPan: false,
	             maxWidth: 0,
	             pixelOffset: new google.maps.Size(-190, 0),
	             zIndex: null,
	             closeBoxURL: "http://www.google.com/intl/en_us/mapfiles/close.gif",
	             infoBoxClearance: new google.maps.Size(1, 1),
	             enableEventPropagation: false
	    };

	    var ib = new InfoBox(myOptions1);
	    ib.open(map, marker); 
	    google.maps.event.addListener(marker, "click", function() { 
	    ib.open(map, marker); 
		});

	});  

})(jQuery);