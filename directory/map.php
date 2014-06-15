<?PHP
include('config.php');

/*if (!empty($_POST)){
$q = $_POST["address"];
}ELSE{
$q = $_GET["address"];
}
$base = $_SERVER['PHP_SELF'] . "?address=" . $q ;
//echo $q . "<BR>\r\n";
$filler = "http://rpc.geocoder.us/service/csv?address=" . (urlencode($q));
$gm = fopen($filler,"r");
$tmp = fgetcsv($gm,8000);
fclose($gm);
$la = $tmp["0"];
$lo = $tmp["1"];
print $la."-".$lo;
//echo "<pre>";
var_dump($tmp);
//echo "</pre>";
if (is_numeric($la)){
echo $long . " - " . $lat;
//range of items in nautical miles
$range = 30;
$range = $range * .0025;
$lamax = $la + $range;
$lamin = $la - $range;
$lomax = $lo + $range;
$lomin = $lo - $range;
 }*/
?>
<? 
$sql="select address, city, state from dir_households";
$rs=mysql_query($sql, $conn);
$arr = 0;
while ($rsdata = mysql_fetch_assoc($rs)){
	$addresses[$arr] = $rsdata["address"].", ".$rsdata["city"].", ".$rsdata["state"].", USA";
	//print $coords[$arr]."<br>";
	$arr++;
}
//print_r($addresses);
foreach($addresses as $k => $v){
	/*$filler = "http://rpc.geocoder.us/service/csv?address=" . (urlencode($v));
	$gm = fopen($filler,"r");
	$tmp = fgetcsv($gm,8000);
	fclose($gm);*/
	// Make a request to Google's geocoder to get address lat/long
	$csv = file_get_contents('http://maps.google.com/maps/geo?q=' .
    urlencode($v) . '&output=csv&key=ABQIAAAATwuRmsnjLP4uUMcz_ym2PhSBIOpGbKvKbZdW-VHNIabPA1N4TRSxEel9iN7LZt5YNZS1DJ95vP4lVQ');
	//print $csv."<br>";
	// Parse the first line of the CSV response
	$x = explode(",", $csv);
	$coords[$k] = $x[2].",".$x[3];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Grace Bible Church Directory Map</title>
    <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAATwuRmsnjLP4uUMcz_ym2PhSBIOpGbKvKbZdW-VHNIabPA1N4TRSxEel9iN7LZt5YNZS1DJ95vP4lVQ"
      type="text/javascript"></script>
    <script type="text/javascript">

    //<![CDATA[

    function load() {
      if (GBrowserIsCompatible()) {
        var map = new GMap2(document.getElementById("map_canvas"));
		map.addControl(new GSmallMapControl());
		map.addControl(new GMapTypeControl());
        map.setCenter(new GLatLng(33.473836,-112.144318), 10);
		// Add 10 markers to the map at random locations
  var bounds = map.getBounds();
  var southWest = bounds.getSouthWest();
  var northEast = bounds.getNorthEast();
  var lngSpan = northEast.lng() - southWest.lng();
  var latSpan = northEast.lat() - southWest.lat();
<? 
foreach($coords as $k => $v){
	print "var point = new GLatLng(".$v.");
	map.addOverlay(new GMarker(point));\n";
}?>
      }
    }

    //]]>
    </script>
  </head>
  <body onload="load()" onunload="GUnload()">
    <div id="map_canvas" style="width: 800px; height: 600px"></div>
	<? //print_r($addresses);?><br />
<br />
	<? //print_r($coords);?>
  </body>
</html>