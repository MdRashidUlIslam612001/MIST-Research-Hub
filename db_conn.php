<?php
$conn = oci_connect('DBMS', 'DBMS', 'localhost/XE')
  or die(oci_error());
if (!$conn) {
  echo "Could Not Connect To The Database";
  die();
}
?>