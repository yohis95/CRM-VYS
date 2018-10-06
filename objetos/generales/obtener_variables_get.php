<?php
foreach ($_GET as $key => $value ) {
   if (isset($_GET[$key]))
   	$$key = $value;
}
?>