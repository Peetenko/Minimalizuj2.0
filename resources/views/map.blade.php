
<!DOCTYPE html>
<html>
  <head>
    <title>Simple Marker</title>
    <!-- The callback parameter is required, so we use console.debug as a noop -->
    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9U8wQQOUNRhzo7LAFg_7ujfKPcz5XVQE&callback=console.debug&libraries=maps,marker&v=beta">
    </script>
    <link rel="stylesheet" href="./style.css"/>
  </head>
  <body>
    <gmp-map center="48.155338287353516,17.165557861328125" zoom="16" map-id="DEMO_MAP_ID">
      <gmp-advanced-marker position="48.155338287353516,17.165557861328125" title="My location"></gmp-advanced-marker>

    </gmp-map>
  </body>
</html>
<style>
    /* Always set the map height explicitly to define the size of the div
 * element that contains the map. */
gmp-map {
  height: 50%;
  width: 80%;
  margin: auto;
  border-radius: 10px;
  margin-top: 100px;
}

/* Optional: Makes the sample page fill the window. */
html,
body {
  height: 100%;
  margin: 0;
  padding: 0;
}
</style>
