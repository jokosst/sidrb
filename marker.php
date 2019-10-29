//        function initMap() {
//         var map = new google.maps.Map(document.getElementById('map'), {
//           zoom: 12,
//           center: {lat: -0.0352232, lng: 109.2615093}
//         });

//         setMarkers(map);

//       }

      
//  var image1 = 'mak1.png';
//  var image2 = 'mak2.png';
//  var image3 = 'mak3.png';
//        function setMarkers(map) { 
//         <?php
//             $query = mysqli_query($connect, "SELECT * FROM tbl_tempat LIMIT 3");
//          while($data = mysqli_fetch_array($query)){
//             $lat = $data['lat'];
//             $lng = $data['lng']; 
//             $alamat = $data['alamat'];                        
//           ?>
//    var contentString = '<div id="content">'+
//             '<div id="siteNotice">'+
//             '</div>'+
//             '<h3 id="firstHeading" class="firstHeading"><?php // echo $alamat; ?></h3>'+
//             '<div id="bodyContent">'+
//             '<p><b>Tinggi Dataran : 1,3 M </b> <br>' +
//             '<b>Ketinggian Air :  1,2 M</b><br>'+
//             '<b>Curah Hujan : 42,3 MM </b><br>'+
//             '<b>Nilai : 1,23 M (SEDANG) </b></p>'+
//             '</div>'+
//             '</div>';   
            
//     var infowindow = new google.maps.InfoWindow({
//           content: contentString
//         });
    
//         var marker = new google.maps.Marker({
//             position: {lat: <?php //echo $lat; ?>, lng: <?php //echo $lng; ?>},
//             map: map,
//             title:'Daerah',
//             icon: image1
//             });
// marker.addListener('click', function() {
//           infowindow.open(map, marker);
//         });

//         <?php } ?> 
//        }