<?php

function validate_presences($required_fields) {
	global $errors;
	foreach($required_fields as $field) {
		$value = trim($_POST[$field]);
		if (!has_presence($value)) {
			$errors[$field] = fieldname_as_text($field) . " can't be blank";
		}
	}
}
function fieldname_as_text($fieldname) {
	$fieldname = str_replace("_", " ", $fieldname);
	$fieldname = ucfirst($fieldname);
	return $fieldname;
}
function has_presence($value) {
	return isset($value) && $value !== "";
}


// * string length
// min length
function has_min_length($value, $min) {
	return strlen($value) >= $min;
}
function validate_min_lengths($fields_with_min_lengths) {
	global $errors;
	// Expects an assoc. array
	foreach($fields_with_min_lengths as $field => $min) {
		$value = trim($_POST[$field]);
	  if (!has_min_length($value, $min)) {
	    $errors[$field] = fieldname_as_text($field) . " is too short. Minimum of $min characters.";
	  }
	}
}

// * string length
// max length
function has_max_length($value, $max) {
	return strlen($value) <= $max;
}
function validate_max_lengths($fields_with_max_lengths) {
	global $errors;
	// Expects an assoc. array
	foreach($fields_with_max_lengths as $field => $max) {
		echo $value = trim($_POST[$field]);
	  if (!has_max_length($value, $max)) {
	    $errors[$field] = fieldname_as_text($field) . " is too long";
	  }
	}
}

function validate_email($email){
	global $errors;
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors[$email] = fieldname_as_text($email) . " is not a valid email address.";
	}
}