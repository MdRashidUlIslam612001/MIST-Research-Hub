<?php
$conn = oci_connect('MISTRESEARCHHUB', 'MistResearchHub','localhost/XE')
  or die(oci_error());
if (!$conn) {
  echo "Could Not Connect To The Database";
  die();
}
?>