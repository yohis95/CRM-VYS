<?php
foreach ($_POST as $key => $value ) {
   if (isset($_POST[$key]))
   	$$key = $value;
}
?>