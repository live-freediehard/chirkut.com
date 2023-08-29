<?php
$to = "919741736493@airtelkk.com";
$subject = "Hi!";
$body = "Hi How are you";
$from_header = "hi@hi.com";

if ( mail("919741736493@airtelkk.com", "Hi!", "Hi How are you","hi@hi.com")) {
  echo("<p>Message successfully sent!</p>");
 } else {
  echo("<p>Message delivery failed...</p>");
 }
?>