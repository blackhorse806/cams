<?php

$app->get("/variation/:variation_id/approve", function($variation_id) use ($app, $db, $user) {
	if ($user['type'] != "admin" && $user['type'] != "developer") {
		$app->redirect($app->urlFor('/variation/dash', ['variation_id' => $variation_id]));
	}
    // Retrieve unit
	$unit = new Unit($variation_id, $db);
    // If unit exists
    if ($unit->exists()) {
        $unit->approve();
        $app->redirect($app->urlFor('/variation/dash', ['variation_id' => $variation_id]));
    } else {
        $app->redirect('/');
    }
})->name('/variation/approve');
