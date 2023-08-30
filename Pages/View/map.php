<?php
require('functions.php');
?>
<!DOCTYPE html>
<html lang="en" dir="">
<head>


    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta charset="UTF-8" />
    <link rel="shortcut icon" href="../../dist-assets/images/logo.png" type="image/x-icon">

    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>M-Karo</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet" />
    <link href="../../dist-assets/css/themes/lite-purple.min.css" rel="stylesheet" />
    <link href="../../dist-assets/css/plugins/perfect-scrollbar.min.css" rel="stylesheet" />

    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?language=en&key=AIzaSyBbQvUzMljIxDUIRNAa3CYJr3l4jeVyQKs&libraries=geometry"></script>


    <script type="text/javascript">
            var marker;
            var markernew;
            var infowindow;

            function initialize() {
              var latlng = new google.maps.LatLng(-1.286389, 36.817223);
              
              var options = {
                zoom: 40,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
              }
              var map = new google.maps.Map(document.getElementById("mapid"), options);


            //map.data.addGeoJson('polygon.geojson');
   

              var html = "<table class='table table-borderless'>" +
                         "<tr><td class='form-control'>Name:</td> <td><input type='text' class='form-control' id='name'/> </td> </tr>" +
                         "<tr><td class='form-control'>Email:</td> <td><input type='text' class='form-control' id='mail'/></td> </tr>" +
                         "<tr><td class='form-control'>Phone:</td> <td><input type='text' class='form-control' id='phone'/></td> </tr>" +

                        

                         "<tr><td></td><td><input class='btn btn-primary' type='button' value='Update'     onclick='saveData()'/></td></tr>";

              infowindow = new google.maps.InfoWindow({
               content: html
              });

              google.maps.event.addListener(map, "click", function(event) {
                  markernew = new google.maps.Marker({
                    position: event.latLng,
                    map: map
                  });
                  google.maps.event.addListener(markernew, "click", function() {
                    infowindow.open(map, markernew);
                  });
              });


             var map;
             var bounds = new google.maps.LatLngBounds();
             //Carry out an Ajax request.
             var infoWindow = new google.maps.InfoWindow(), marker, i;
                $.ajax({
                    url: 'mapgetlocation.php',
                    success:function(data){
                        //console.log(data);
                        //Loop through each location.
                      var i = 0;
                        $.each(data, function(){
                          i++;
                          var name = this.NAME;
                          var mail = this.MAIL;
                          var phone = this.PHONE;
                            //Plot the location as a marker
                             var pos = new google.maps.LatLng(this.LAT, this.LNG); 
                             bounds.extend(pos);
                             marker =  new google.maps.Marker({
                                  position: pos,                          
                                  map: map,
                                  title: name
                              });
                            map.fitBounds(bounds);
                             google.maps.event.addListener(marker, 'click', (function(marker, i) {
                             return function() {
                        infoWindow.setContent('<div class="form-group mb-3 text-center"> <p><br><b>'+  name +'<br>'+ mail +'<br>'+ phone +'</b></p></div>');
                        infoWindow.open(map, marker);
                    }
                })(marker, i));        
                        });
                    }
                });

            // Set zoom level
            var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
                this.setZoom(10);
                google.maps.event.removeListener(boundsListener);
            });

            }

            function saveData() {
              var name = document.getElementById("name").value;
              var mail = document.getElementById("mail").value;
              var phone = document.getElementById("phone").value;
              var lat = markernew.getPosition().lat();
              var lng = markernew.getPosition().lng();
              infowindow.close(); 
              


               $.ajax({
                url:'mapadd.php',
                type:'get',
                data:{name:name,mail:mail,phone:phone,lat:lat,lng:lng},
                success:function(response){
                   
                    if(response.trim() == 1){

                       swal({
                            title: "M-Karo",
                            text: "Location successfully updated!",
                            icon: "success",
                            button: "Okay"});
                            initialize();
                        
                    }
                    if(response.trim() == 2){
                        
                        swal({
                            title: "M-Karo",
                            text: "Server Error!",
                            icon: "error",
                            button: "Okay"});
                       
                    }
                }
              });
   
            
            }

            function doNothing() {}
            </script>

</head>

<body class="text-left" onload="initialize()">
    <div class="app-admin-wrap layout-horizontal-bar">
       
        <!-- header top menu end-->
       <?php
       require('nav.php');
       ?>
        <!-- =============== Horizontal bar End ================-->
        <div class="main-content-wrap d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <!-- <div class="breadcrumb">
                    <h1>M-Karo</h1>
                    <ul>
                        <li><a href="#">Class Registration Form</a></li>
                        <li><?php echo $_SESSION['fullname'];   ?></li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div> -->
                <div class="row">
                    <div class="col-md-12">
                        <div id="mapid" style="width: 100%; height: 700px" class="card card-primary">
              
              
                        </div>
                        
                    </div>        
                </div><!-- end of main-content -->
            </div>
          
        </div>
    </div><!-- ============ Search UI Start ============= -->
   
    <!-- ============ Search UI End ============= -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="../../dist-assets/js/plugins/jquery-3.3.1.min.js"></script>
    <script src="../../dist-assets/js/plugins/bootstrap.bundle.min.js"></script>
    <script src="../../dist-assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../../dist-assets/js/scripts/script.min.js"></script>
    <script src="../../dist-assets/js/scripts/sidebar-horizontal.script.js"></script>
</body>


</html>


