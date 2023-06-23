<!DOCTYPE html>
<html>

<head>
    <title>Nearby Pharmacies</title>
    <style>
        #map {
            height: 400px;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />
</head>

<body>
    <h1>Nearby Pharmacies</h1>
    <div id="map"></div>

    <script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        let latitude, longitude;
        // Get user's current location
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
        } else {
            console.error('Geolocation is not supported by this browser.');
        }

        function successCallback(position) {
            latitude = position.coords.latitude;
            longitude = position.coords.longitude;
            const options = {
                method: 'GET',
                headers: {
                    accept: 'application/json',
                    Authorization: 'fsq3xAnrIJvp8q5yS29dsKTyg7O3JttRV+FmtTSY7HZt+Ug='
                }
            };

            const apiUrl = `https://api.foursquare.com/v3/places/nearby?ll=${latitude},${longitude}&query=pharmacy`;

            fetch(apiUrl, options)
                .then(response => response.json())
                .then(response => displayPharmacies(response.results))
                .catch(err => console.error(err));
        }

        function errorCallback(error) {
            console.error('Error getting user location:', error);
        }

        function displayPharmacies(pharmacies) {
    // Get user's current location
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
    } else {
        console.error('Geolocation is not supported by this browser.');
    }

    function successCallback(position) {
        const latitude = position.coords.latitude;
        const longitude = position.coords.longitude;

        // Initialize the map
        const map = L.map('map').setView([latitude, longitude], 16);

        // Add a tile layer (e.g., OpenStreetMap) to the map
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        // Add markers for each pharmacy
        pharmacies.forEach(pharmacy => {
            // const latitudeasa = pharmacy.geocodes.latitude;
            // const longitudeasas = pharmacy.geocodes.longitude;

            if (latitude && longitude) {
                const pharmacyLatLng = [latitude, longitude];
                L.marker(pharmacyLatLng)
                    .addTo(map)
                    .bindPopup(pharmacy.name);
                         // Zoom to the marker when clicked
                marker.on('click', function() {
                    map.setView(marker.getLatLng(), 16);
                });
            }
        });
    }

    function errorCallback(error) {
        console.error('Error getting user location:', error);
    }
}

    </script>
</body>

</html>