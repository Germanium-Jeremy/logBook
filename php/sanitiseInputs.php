<?php
function sanitize_input($data) {
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
}

function validate_input($data, $pattern) {
     return preg_match($pattern, $data);
}
?>