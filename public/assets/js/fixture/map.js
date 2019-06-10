/** 
 * 
*/

mapboxgl.accessToken = 'pk.eyJ1IjoiZ29sZGVuaHVudGVyMjEiLCJhIjoiY2p3cGkxYnhtMHk5aTQ0bzZ4dnNkdzRhNiJ9.p6ZCYpoQ1vAyg6SLhTR8hw';

var map = new mapboxgl.Map({
    container: 'map', // container id
    style: 'mapbox://styles/mapbox/streets-v11',
    center: [-96.7485444, 17.0774812], // starting position ,,
    zoom: 14 // starting zoom
});


var marker = new mapboxgl.Marker({
    draggable: true
    })
    .setLngLat([-96.7485444, 17.0774812])
    .addTo(map);
     
    function onDragEnd() {
    var lngLat = marker.getLngLat();
    var coordinates = document.getElementById('lugar_procedencia_a');
    coordinates.value =lngLat.lng + ',' + lngLat.lat;
    console.log(coordinates.value);
    }
     
    marker.on('dragend', onDragEnd);

 