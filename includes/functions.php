<?php
    function form_errors($errors=array()) {
		$output = "";
		if (!empty($errors)) {
			$output .= "<div class='alert alert-danger font-weight-bold alert-dismissible'>
							<a href='#' class='close close-message' data-dismiss='alert' aria-label='close'>&times;</a>";
		  $output .= "Please fix the following errors:";
		  $output .= "<ul>";
		  foreach ($errors as $key => $error) {
		    $output .= "<li>";
				$output .= htmlentities($error);
				$output .= "</li>";
		  }
		  $output .= "</ul>";
		  $output .= "</div>";
		}
		return $output;
	}