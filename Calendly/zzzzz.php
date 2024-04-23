<?php

$string = "Janet Smith";

$words = explode(" ", $string);

$firstname = $words[0];
$lastname = $words[1];

echo $firstname . '<br>' . $lastname;

?>