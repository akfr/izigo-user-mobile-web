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

    $("#refresh").click(function(){
        refreshOrderData();
    })

    function initialLoadData() {
        var searchParams = new URLSearchParams(window.location.search);
        var orderId = searchParams.get('orderId')
        var driverMarkers = [];
        $("#loading").hide();

        $.ajax({
            method: "POST",
            url: "backend.php",
            data: { action: 'getOrderInfo', orderId: Number(orderId) }
          })
        .done(function( data, status, ok ) {
            var orderInfo = JSON.parse(data);
            handleOrderData(data)

            if (orderInfo.delivery_man_id != null) {
                setInterval(() => {
                    $.ajax({
                        method: "POST",
                        url: "backend.php",
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
    initialLoadData();

    function refreshOrderData(){
        var searchParams = new URLSearchParams(window.location.search);
        var orderId = searchParams.get('orderId')
        $("#loading").show();
        $.ajax({
            method: "POST",
            url: "backend.php",
            data: { action: 'getOrderInfo', orderId: Number(orderId) }
          })
        .done(function( data, status, ok ) {
            $("#loading").hide();
            handleOrderData(data)
        });
    }

    function handleOrderData(data){
        var orderInfo = JSON.parse(data);
        var originAddress = JSON.parse(orderInfo.origin_address);
        var destinationAddress = JSON.parse(orderInfo.destination_address);
        
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

        if (orderInfo.status === 'pending') {
            progress.setAttribute('value', 0 * 100 / 4 );
            $("#pending").addClass("done");
        } else if(orderInfo.status === 'confirmed'){
            progress.setAttribute('value', 1 * 100 / 4 );
            $("#pending").addClass("done");
            $("#confirmed").addClass("done");
        } else if(orderInfo.status === 'processing'){
            progress.setAttribute('value', 2 * 100 / 4 );
            $("#pending").addClass("done");
            $("#confirmed").addClass("done");
            $("#processing").addClass("done");
        } else if(orderInfo.status === 'out_for_delivery'){
            progress.setAttribute('value', 3 * 100 / 4 );
            $("#pending").addClass("done");
            $("#confirmed").addClass("done");
            $("#processing").addClass("done");
            $("#out_for_delivery").addClass("done");
        } else if(orderInfo.status === 'delivered'){
            progress.setAttribute('value', 4 * 100 / 4 );
            $("#pending").addClass("done");
            $("#confirmed").addClass("done");
            $("#processing").addClass("done");
            $("#out_for_delivery").addClass("done");
            $("#delivered").addClass("done");
        }
    }

    // const stepButtons = document.querySelectorAll('.step-button');
    //         const progress = document.querySelector('#progress');

    // Array.from(stepButtons).forEach((button,index) => {
    //     button.addEventListener('click', () => {
    //         progress.setAttribute('value', index * 100 /(stepButtons.length - 1) );

    //         stepButtons.forEach((item, secindex)=>{
    //             if(index > secindex){
    //                 item.classList.add('done');
    //             }
    //             if(index < secindex){
    //                 item.classList.remove('done');
    //             }
    //         })
    //     })
    // })

}(jQuery));
  