        <!-- Google Maps API Key (you will have to obtain a Google Maps API key to use Google Maps) -->
        <!-- For more info please have a look at https://developers.google.com/maps/documentation/javascript/get-api-key#key -->
        <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyBePaaO5_VWo96ne7hN_5pQDuPNuZitxbs&amp;libraries=places&amp;language=id&amp;alternative=true"></script>
        
        <script type="text/javascript">
                var mapOptions = {   
                    zoom: 15,
                    center: new google.maps.LatLng(-7.149555,111.8807316),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };


                var mapElement = document.getElementById('map_detail');

                var map = new google.maps.Map(mapElement, mapOptions);

                function addMarker(lat, lng, nama, icon) {
                    var pt = new google.maps.LatLng(lat, lng);
                    var marker = new google.maps.Marker({
                        map: map,
                        position: pt,
                        icon : icon
                    });

                    google.maps.event.addListener(marker, 'click', getInfoCallback(map, nama));
                }

                var trafficLayer = new google.maps.TrafficLayer({map : map});
                var directionsDisplay = new google.maps.DirectionsRenderer({map: map});
                var directionsService = new google.maps.DirectionsService;

                directionsDisplay.setPanel(document.getElementById('cont'))
                    
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

                function getInfoCallback(map, content) {
                    var infowindow = new google.maps.InfoWindow({content: content});
                    return function() {
                            infowindow.setContent(content); 
                            infowindow.open(map, this);
                        };
                }

                function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                    infoWindow.setPosition(pos);
                    infoWindow.setContent(browserHasGeolocation ?
                                          'Error: The Geolocation service failed.':
                                          'Error: Your browser doesn\'t support geolocation.' );
                }

                <?php if (isset($warkop1)){ ?>
                    <?php
                        $lat = $warkop1["lat"];
                        $lon = $warkop1["lng"];
                        $nama = '<strong>'.$warkop1["nama_warkop"].'</strong><br>'.$warkop1["alamat"];
                        $icon = base_url('assets/icon/warkop.png');
                        echo ("addMarker($lat, $lon, '$nama', '$icon');\n");
                    ?>

                var infoWindow3 = new google.maps.InfoWindow({map: map});
                    var pos1 = {
                        lat: <?php echo $lat; ?>,
                        lng: <?php echo $lon; ?>
                    };
                    infoWindow3.setPosition(pos1);
                    infoWindow3.setContent('<strong><?php echo $warkop1["nama_warkop"] ?></strong>');

                <?php } ?>
        </script>  