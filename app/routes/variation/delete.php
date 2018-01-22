<?php

$app->get("/variation/:variation_id/delete", function($variation_id) use ($app, $db, $user) {
	if ($user['type'] != "developer") {
		$app->redirect($app->urlFor('/variation/list'));
	}
	// Retrieve unit
	$unit = new Unit($variation_id, $db);
    // If unit exists
    if ($unit->exists()) {
        $unit->delete();
        $app->redirect($app->urlFor('/variation/list'));
        echo "Done";
    } else {
        echo "Unit does not exist";
    }
})->name('/variation/delete');
