        <!-- Google Maps API Key (you will have to obtain a Google Maps API key to use Google Maps) -->
        <!-- For more info please have a look at https://developers.google.com/maps/documentation/javascript/get-api-key#key -->
        <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyBePaaO5_VWo96ne7hN_5pQDuPNuZitxbs&amp;libraries=places&amp;language=id&amp;alternative=true"></script>
        
        <script type="text/javascript">
                var mapOptions = {   
                    zoom: 15,
                    center: new google.maps.LatLng(-7.149555,111.8807316),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };


                var mapElement = document.getElementById('map');

                var map = new google.maps.Map(mapElement, mapOptions);

                var infoWindow = new google.maps.InfoWindow({map: map});
                    var pos1 = {
                        lat: -7.1495241,
                        lng: 111.8811138
                    };
                infoWindow.setPosition(pos1);
                infoWindow.setContent('<strong>BOJONEGORO</strong>');

// Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }

            var marker1 = new google.maps.Marker({
                    position : place.geometry.location,
                    title : place.name,
                    map : map,
                    draggable : true
                });

            google.maps.event.addListener(marker1, 'drag', function() {
                updateMarkerPosition(marker1.getPosition());
            });

            function updateMarkerPosition(latLng) {
                    document.getElementById('lat').value = [latLng.lat()];
                    document.getElementById('long').value = [latLng.lng()];
                }

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });

//

                var trafficLayer = new google.maps.TrafficLayer({map : map});
                var directionsDisplay = new google.maps.DirectionsRenderer({map: map});
                var directionsService = new google.maps.DirectionsService;

                directionsDisplay.setPanel(document.getElementById('cont'));

                    
                // Try HTML5 geolocation.
                if (navigator.geolocation) {
                  navigator.geolocation.getCurrentPosition(function(position) {
                    var pos = {
                      lat: position.coords.latitude,
                      lng: position.coords.longitude
                    };

                    var infoWindow2 = new google.maps.InfoWindow({map: map});
                    infoWindow2.setPosition(pos);
                    infoWindow2.setContent('<strong>Anda<br>Disini</strong>');

                    map.setCenter(pos);

                    directionsService.route({
                      origin: pos,
                      destination: pos1,
                      travelMode: 'DRIVING'
                    }, function(response, status) {
                      if (status === 'OK') {
                        directionsDisplay.setDirections(response);
                      } else {
                        window.alert('Directions request failed due to ' + status);
                      }
                    });

                  }, function() {
                    handleLocationError(true, infoWindow, map.getCenter());
                  });
                } else {
                  // Browser doesn't support Geolocation
                  handleLocationError(false, infoWindow, map.getCenter());
                }


                function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                    infoWindow.setPosition(pos);
                    infoWindow.setContent(browserHasGeolocation ?
                                          'Error: The Geolocation service failed.':
                                          'Error: Your browser doesn\'t support geolocation.' );
                }

                function addMarker(lat, lng, nama, icon) {
                    var pt = new google.maps.LatLng(lat, lng);
                    var marker = new google.maps.Marker({
                        map: map,
                        position: pt,
                        icon : icon
                    });

                    google.maps.event.addListener(marker, 'click', getInfoCallback(map, nama));
                }

                function getInfoCallback(map, content) {
                    var infowindow = new google.maps.InfoWindow({content: content});
                    return function() {
                            infowindow.setContent(content); 
                            infowindow.open(map, this);
                        };
                }
                <?php if (isset($warkop)){ ?>
                    <?php foreach ($warkop as $row): ?>
                    <?php
                        $lat = $row->lat;
                        $lon = $row->lng;
                        $nama = '<strong>'.$row->nama_warkop.'</strong><br>'.$row->alamat;
                        $icon = base_url('assets/icon/warkop.png');
                        echo ("addMarker($lat, $lon, '$nama', '$icon');\n");
                    ?>
                    <?php endforeach; ?>
                <?php } ?>
        </script>  