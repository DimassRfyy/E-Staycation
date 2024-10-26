
document.addEventListener('DOMContentLoaded', function () {
    // Get the iframe element
    var iframe = document.getElementById('map-iframe');
    // Get the <a> element
    var mapLink = document.getElementById('map-link');

    // Extract the location from the iframe's src attribute
    var iframeSrc = iframe.src;
    var locationMatch = iframeSrc.match(/q=([^&]+)/);
    if (locationMatch) {
        var location = locationMatch[1];
        // Decode the location
        location = decodeURIComponent(location);

        // Construct the Google Maps link
        var mapsLink = 'https://www.google.com/maps/search/?api=1&query=' + location;
        // Update the href attribute of the <a> element
        mapLink.href = mapsLink;
    }
});