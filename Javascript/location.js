let map, marker;

async function initMap() {
    const { Map } = await google.maps.importLibrary("maps");
    const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");

    // Initialize map with a default position (will be updated later)
    map = new Map(document.getElementById('map'), {
        center: { lat: 0, lng: 0 }, // Default position (will be updated)
        zoom: 15,
        mapId: 'DEMO_MAP_ID' // Add your map ID here
    });

    // Prepare the marker but do not add it to the map yet
    marker = new AdvancedMarkerElement({
        map,
        position: { lat: 0, lng: 0 }, // Default position (will be updated)
        gmpDraggable: true, // Make the marker draggable
    });

    // Add a dragend listener to the marker
    marker.addListener('dragend', function(event) {
        const latLng = event.latLng;
        updatePosition(latLng);
    });

    // Get the user's current location and update the map and marker
    getLocation();
}
    // Function to trigger fullscreen programmatically
    function triggerFullscreen() {
        const mapElement = document.getElementById('map');
        if (mapElement.requestFullscreen) {
          mapElement.requestFullscreen();
        } else {
          // Handle cases where requestFullscreen is not supported
          // You can use a fallback solution like using a modal to cover the screen
          console.warn("Fullscreen API not supported.");
        }
      }
function getLocation() {
    useGoogleGeolocationAPI();
/*     if (!navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
        useGoogleGeolocationAPI();
    } */
}

/* function showPosition(position) {
    const lat = position.coords.latitude;
    const lon = position.coords.longitude;
    displayLocation(lat, lon);
} */

function displayLocation(lat, lon) {
    //const status = document.getElementById("status");
    //status.innerHTML = "Latitude: " + lat + "<br>Longitude: " + lon;

    const location = { lat: lat, lng: lon };

    // Center the map and update marker position
    map.setCenter(location);
    marker.position = location; // Update position
} 

function updatePosition(latLng) {
    const lat = latLng.lat();
    const lon = latLng.lng();
    // send the lon and lat to engine/session.php to set updated_coordinates
    sendCoordinates(lat, lon);
}

function sendCoordinates(lat, lon) {
    fetch('engine/location.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ latitude: lat, longitude: lon })
    })
    .then(response => response.json())
    .then(data => {
        const responseElem = document.getElementById("response");
        responseElem.innerHTML = data.message;
    })
    .catch(error => console.error('Error:', error));
}

function showError(error) {
    const status = document.getElementById("status");
    switch (error.code) {
        case error.PERMISSION_DENIED:
            //status.innerHTML = "User denied the request for Geolocation.";
            break;
        case error.POSITION_UNAVAILABLE:
           // status.innerHTML = "Location information is unavailable.";
            break;
        case error.TIMEOUT:
            //status.innerHTML = "The request to get user location timed out.";
            break;
        case error.UNKNOWN_ERROR:
            //status.innerHTML = "An unknown error occurred.";
            break;
    }
    useGoogleGeolocationAPI();
}

function useGoogleGeolocationAPI() {
    const apiKey = 'AIzaSyDpKzaLDH-Uvq3akmmeQmqU9Md3lTr-QTk';
    const url = `https://www.googleapis.com/geolocation/v1/geolocate?key=${apiKey}`;

    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.location) {
            const lat = data.location.lat;
            const lon = data.location.lng;
            displayLocation(lat, lon);
        } else {
            //document.getElementById("status").innerHTML = "Google Geolocation API failed.";
        }
    })
    .catch(error => {
       // console.error('Error:', error);
        //document.getElementById("status").innerHTML = "Google Geolocation API failed.";
    });
}

document.addEventListener("DOMContentLoaded", initMap);