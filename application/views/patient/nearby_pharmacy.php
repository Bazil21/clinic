<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />

<style>
    table.dataTable thead tr th {
        background-color: #0A4D68;
        color: #ffff;
        font-weight: 400;
        font-size: 14px;
    }

    .control-label {
        font-weight: 800;
        padding: 2px;
    }


    .controls {
        text-align: center;
    }

    .form-horizontal .control-label {
        width: none;
    }
</style>


<div class="box">

    <div class="box-header">



        <!------CONTROL TABS START------->

        <ul class="nav nav-tabs nav-tabs-left">

            <?php if (isset($edit_profile)) : ?>

                <li class="active">

                    <a href="#edit" data-toggle="tab"><i class="icon-wrench"></i>

                        <?php echo ('View Prescription'); ?>

                    </a></li>

            <?php endif; ?>

            <li class="<?php if (!isset($edit_profile)) echo 'active'; ?>">

                <a href="#list" data-toggle="tab"><i class="icon-align-justify"></i>

                    <?php echo ('Prescription List'); ?>

                </a></li>

        </ul>

        <!------CONTROL TABS END------->



    </div>

    <div class="box-content padded">

        <div class="tab-content">
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




        </div>

    </div>

</div>