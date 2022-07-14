jQuery(function ($) {
    'use strict';

    var myLatLng = {
        lat: 5.36, lng: -4.0083
    };
    const style = [
        {
            "featureType": "administrative.locality",
            "elementType": "all",
            "stylers": [
                {
                    "hue": "#c79c60"
                },
                {
                    "saturation": 7
                },
                {
                    "lightness": 19
                },
                {
                    "visibility": "on"
                }
            ]
        },
        {
            "featureType": "landscape",
            "elementType": "all",
            "stylers": [
                {
                    "hue": "#ffffff"
                },
                {
                    "saturation": -100
                },
                {
                    "lightness": 100
                },
                {
                    "visibility": "simplified"
                }
            ]
        },
        {
            "featureType": "poi",
            "elementType": "all",
            "stylers": [
                {
                    "hue": "#ffffff"
                },
                {
                    "saturation": -100
                },
                {
                    "lightness": 100
                },
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "road",
            "elementType": "geometry",
            "stylers": [
                {
                    "hue": "#c79c60"
                },
                {
                    "saturation": -52
                },
                {
                    "lightness": -10
                },
                {
                    "visibility": "simplified"
                }
            ]
        },
        {
            "featureType": "road",
            "elementType": "labels",
            "stylers": [
                {
                    "hue": "#c79c60"
                },
                {
                    "saturation": -93
                },
                {
                    "lightness": 31
                },
                {
                    "visibility": "on"
                }
            ]
        },
        {
            "featureType": "road.arterial",
            "elementType": "labels",
            "stylers": [
                {
                    "hue": "#c79c60"
                },
                {
                    "saturation": -93
                },
                {
                    "lightness": -2
                },
                {
                    "visibility": "simplified"
                }
            ]
        },
        {
            "featureType": "road.local",
            "elementType": "geometry",
            "stylers": [
                {
                    "hue": "#c79c60"
                },
                {
                    "saturation": -52
                },
                {
                    "lightness": -10
                },
                {
                    "visibility": "simplified"
                }
            ]
        },
        {
            "featureType": "transit",
            "elementType": "all",
            "stylers": [
                {
                    "hue": "#c79c60"
                },
                {
                    "saturation": 10
                },
                {
                    "lightness": 69
                },
                {
                    "visibility": "on"
                }
            ]
        },
        {
            "featureType": "water",
            "elementType": "all",
            "stylers": [
                {
                    "hue": "#c79c60"
                },
                {
                    "saturation": -78
                },
                {
                    "lightness": 67
                },
                {
                    "visibility": "simplified"
                }
            ]
        }
    ];

    // const styles = [new google.maps.MapTypeStyle()];
    var mapOptions = {
        center: myLatLng,
        zoom: 13,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        styles: style
    };

    var map = new google.maps.Map(document.getElementById("map"), mapOptions);
    var directionService = new google.maps.DirectionsService();
    var directionDisplay = new google.maps.DirectionsRenderer();
    directionDisplay.setMap(map);



    function calcRoute() {
        var searchParams = new URLSearchParams(window.location.search);
        var orderId = searchParams.get('orderId')
        var driverMarkers = [];

        $.ajax({
            method: "POST",
            url: "backend.php",
            data: { action: 'getOrderInfo', orderId: Number(orderId) }
          })
        .done(function( data, status, ok ) {
            var orderInfo = JSON.parse(data);
            var originAddress = JSON.parse(orderInfo.origin_address);
            var destinationAddress = JSON.parse(orderInfo.destination_address);
            
            // var bounds = new google.maps.LatLngBounds();
            // // for (var i = 0; i < lieux.length; i++) {
            // //   var marker = new google.maps.Marker({
            // //     position: lieux[i].coordonnees,
            // //     nom: lieux[i].nom,
            // //     map: map
            // //   });
            // //   bounds.extend(marker.getPosition());
            // // }
            // map.fitBounds(bounds);

            var request = {
                origin: new google.maps.LatLng(originAddress.lat, originAddress.lng), // new google.maps.LatLng(5.3117364, -4.0088345), //document.getElementById("from").value,
                destination: new google.maps.LatLng(destinationAddress.lat, destinationAddress.lng), // new google.maps.LatLng(5.316176899999999, -3.9967327), //document.getElementById("to").value,
                travelMode: google.maps.TravelMode.DRIVING,
                unitSystem: google.maps.UnitSystem.IMPERIAL
            }
    
            directionService.route(request, (result, status) => {
                if (status == google.maps.DirectionsStatus.OK) {
                    directionDisplay.setDirections(result);
                    directionDisplay.setMap(map);
                }
            });

            if(orderInfo.delivery_man_id != null){
                setInterval(() => {
                    $.ajax({
                        method: "POST",
                        url: "http://izigoci.com/backend.php",
                        data: { action: 'getDriverLivePosition', driverId: orderInfo.delivery_man_id }
                      })
                    .done(function( data, status, ok ) {
                        driverMarkers.forEach(m => {
                            m.setMap(null);
                        });

                        var driverPos = JSON.parse(data);
                        var driverLatLng = new google.maps.LatLng(Number(driverPos.latitude), Number(driverPos.longitude));
                        var image = "assets/img/moto_delivery_2.png"
                        var marker = new google.maps.Marker({
                            position: driverLatLng,
                            title:"Chauffeur",
                            animation: google.maps.Animation.BOUNCE,
                            icon: image
                        });
                        
                        marker.setMap(map);
                        
                        const infowindow = new google.maps.InfoWindow({
                            content: driverPos.f_name + ' ' + driverPos.l_name + ' ' + driverPos.phone,
                          });
        
                          marker.addListener("click", () => {
                            infowindow.open({
                              anchor: marker,
                              map,
                              shouldFocus: false,
                            });
                          });

                          driverMarkers.push(marker);
                    });
                }, 10000)
            }
            
        });
    }
    calcRoute();

}(jQuery));

//  function initMap() {
//     const directionsService = new google.maps.DirectionsService();
//     const directionsRenderer = new google.maps.DirectionsRenderer();
//     const map = new google.maps.Map(
//       document.getElementById("map"),
//       {
//         zoom: 7,
//         center: { lat: 41.85, lng: -87.65 },
//       }
//     );
  
//     directionsRenderer.setMap(map);
  
//     const onChangeHandler = function () {
//       calculateAndDisplayRoute(directionsService, directionsRenderer);
//     };
  
//     (document.getElementById("start")).addEventListener(
//       "change",
//       onChangeHandler
//     );
//     (document.getElementById("end")).addEventListener(
//       "change",
//       onChangeHandler
//     );
//   }
  
//   function calculateAndDisplayRoute(
//     directionsService,
//     directionsRendererr
//   ) {
//     directionsService
//       .route({
//         origin: {
//           query: (document.getElementById("start")).value,
//         },
//         destination: {
//           query: (document.getElementById("end")).value,
//         },
//         travelMode: google.maps.TravelMode.DRIVING,
//       })
//       .then((response) => {
//         directionsRenderer.setDirections(response);
//       })
//       .catch((e) => window.alert("Directions request failed due to " + status));
//   }
  
// //   declare global {
// //     interface Window {
// //       initMap: () => void;
// //     }
// //   }
//   window.initMap = initMap;
//   export {};
  