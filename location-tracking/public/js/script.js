// Initialize the map
var map = L.map('map').setView([26.398555, 43.869224], 4);

// Add OpenStreetMap tile layer
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '© OpenStreetMap contributors'
}).addTo(map);

// Initial tracking status
$('#status').text('Idle');

// Event listener for the track button using jQuery
$('#track-button').on('click', function() {
    var locationName = $('#location-name').val();

    // Use the Nominatim API to get latitude and longitude from the location name
    $.ajax({
        url: 'https://nominatim.openstreetmap.org/search',
        method: 'GET',
        data: {
            q: locationName,
            format: 'json',
            addressdetails: 1,
            limit: 1
        },
        success: function(data) {
            if (data.length > 0) {
                var lat = data[0].lat; // Get latitude from the response
                var lng = data[0].lon; // Get longitude from the response

                // Create a new marker for the entered location
                var marker = L.marker([lat, lng]).addTo(map)
                    .bindPopup(locationName)
                    .openPopup();

                // Center the map on the new marker
                map.setView([lat, lng], 13);

                // Update tracking status
                $('#status').text('Location Found: ' + locationName);
            } else {
                alert('Location not found. Please try another name.');
                $('#status').text('Idle');
            }
        },
        error: function() {
            alert('Error retrieving location data. Please try again.');
            $('#status').text('Idle');
        }
    })
})

// Get user current location
if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
        var userLatLng = [position.coords.latitude, position.coords.longitude];
        map.setView(userLatLng, 13);
        L.marker(userLatLng).addTo(map)
            .bindPopup('You are here!')
            .openPopup();

            // Update tracking status
            $('#status').text('You are here!');
    }, function() {
        alert('Unable to retrieve your location.');
        $('#status').text('Idle');
    });
} else {
    alert('Geolocation is not supported by this browser.');
    $('#status').text('Idle');
}


// Add click event listener to the map
map.on('click',function(e){
    var lat = e.latlng.lat; // Latitude of the click
    var lng = e.latlng.lng; // Longitude of the click

    // Use the Nominatim API to get the location name from latitude and longitude
    $.ajax({
        url: 'https://nominatim.openstreetmap.org/reverse',
        method: 'GET',
        data: {
            lat: lat,
            lon: lng,
            format: 'json'
        },
        success: function(data) {
            if (data && data.display_name){
                var locationName = data.display_name; // Location name from the response
                $('#location-name').val(locationName); // Set the input field to the location name
                $('#status').text('Location Selected: ' + locationName); // Update the status

                // Create a marker for the clicked location
                L.marker([lat,lng]).addTo(map)
                .bindPopup(locationName)
                .openPopup();

                // Center the map on the new marker
                map.setView([lat, lng], 13);
            } else {
                alert('Unable to retrieve location name. Please try again.');
            }
        },
        error: function() {
            alert('Error retrieving location data. Please try again.');
        }
    })
})

$(document).ready(function() {
    // By default, show Home and "Who are we" sections, hide "Contact Us" section
    $('#combined-panel').show();
    $('#who-are-we-content').show();
    $('#contact-us-section').show(); 
    $('#services-section').show(); 

    // Home link click
    $('#home-link').on('click', function(event) {
        event.preventDefault();
        $('#combined-panel').show(); // Show home content (Tracking Panel and Map)
        $('#who-are-we-content').show(); // Show "Who are we" content
        $('#contact-us-section').show(); // Show contact us
        $('#services-section').show(); // Show Services section
    });

    // "Who are we" link click
    $('#who-are-we-link').on('click', function(event) {
        event.preventDefault();
        $('#combined-panel').hide(); // Hide the combined panel (Tracking Panel and Map)
        $('#who-are-we-content').show(); // Show "Who are we" content
        $('#contact-us-section').hide(); // Hide contact us
        $('#services-section').hide(); // Hide Services section
    });

    // "Contact Us" link click
    $('#contact-us-link, .contact-btn').on('click', function(event) {
        event.preventDefault();
        $('#combined-panel').hide(); // Hide home content
        $('#who-are-we-content').hide(); // Hide "Who are we" content
        $('#contact-us-section').show(); // Show contact us section
        $('#services-section').hide(); // Hide Services section
    });

    $('#services-link').on('click', function(event) {
        event.preventDefault();
        $('#combined-panel').hide(); // Hide the combined panel
        $('#who-are-we-content').hide(); // Hide "Who are we" content
        $('#contact-us-section').hide(); // Hide Contact Us section
        $('#services-section').show(); // Show Services section
    });
});





