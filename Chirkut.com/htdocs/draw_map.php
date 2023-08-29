<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Chirkut Loaction Tracer</title>
    <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key=ABQIAAAApaxRAEnOJLtq7-B_47CSThQcgK6gdk0dHHYtiAsKJhio0qQGvxQe2wRsiYCzNdd1-TfbFVqvwW3sSA"
            type="text/javascript"></script>
    <script type="text/javascript">
 
    function initialize() {
      if (GBrowserIsCompatible()) {
        var map = new GMap2(document.getElementById("map_canvas"));
        var point = new GLatLng(12.983200,77.583298);
        map.setCenter(new GLatLng(12.983200,77.583298), 7);
        
        map.setUIToDefault();
      }
    }
 
    </script>
  </head>
  <body onload="initialize()" onunload="GUnload()">
    <div id="map_canvas" style="width: 500px; height: 300px"></div>
  </body>
</html>

