<?php

function get_form_view($unit) {
	$core = $unit->attribute('core')->get();
	$view = 'read';
	if ($_SESSION['type'] == 'developer') {
		return 'edit';
	}
	if ($core['state'] != 'Complete') {
		return 'edit';
	}
	return $view;
}
