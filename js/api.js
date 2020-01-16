function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 5,
    center: {lat: 33.9286412, lng: -73.9187827}
  });
  
  var labels = ['miami','orlando','new york'];
  var markers = [];
          
  $.each(locations,function(location, i) {
    markers[location] = new google.maps.Marker({
      position: i,
      map: map,
      title: labels[location]
    });
    markers[location].addListener('click', function() {
        ajax(this.title);
    });
  });         
}
      
var locations = [
  {lat: 25.7825453, lng: -80.2994984},
  {lat: 28.4813018, lng: -81.4387899},
  {lat: 40.6976637, lng: -74.119764}
];


function ajax(data){
  $('.modal').modal('show');
  $.ajax({
    url: 'index.php',
    dataType: 'json',
    data : {'city' : data},
    type : 'post',
    success: function(data){
      $('.modal').modal('hide');
      $('#namecity').html(data.location.city+', '+data.location.region);
      $('#descripcion').html('La humedad en la ciudad en este momento es de <b>'+data.current_observation.atmosphere.humidity+'%</b>');
    }
  });
}
