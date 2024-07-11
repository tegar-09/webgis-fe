// menampilkan basemap
var map = L.map('map').setView([-8.2192, 114.3691], 10); // titik default di Banyuwangi

// menambahkan basemaps OpenStreetMap sebagai layer
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
}).addTo(map);

// Marker that will be moved by user
var marker = L.marker([-8.2192, 114.3691], {
    draggable: true
}).addTo(map);

// Update the inputs when the marker is moved
marker.on('dragend', function(e) {
    var latlng = marker.getLatLng();
    document.getElementById('latitude').value = latlng.lat;
    document.getElementById('longitude').value = latlng.lng;
});

// Update the marker when the map is clicked
map.on('click', function(e) {
    var latlng = e.latlng;
    marker.setLatLng(latlng);
    document.getElementById('latitude').value = latlng.lat;
    document.getElementById('longitude').value = latlng.lng;
});

// Add LocateControl to the map
L.control.locate({
    position: 'topleft',
    setView: 'once',
    keepCurrentZoomLevel: true,
    strings: {
        title: "Show me where I am",
        popup: "You are within {distance} {unit} from this point",
        outsideMapBoundsMsg: "You seem to be outside the boundaries of the map"
    },
    locateOptions: {
        maxZoom: 16,
        enableHighAccuracy: true
    }
}).addTo(map);
