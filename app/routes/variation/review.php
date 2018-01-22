<?php

$app->get("/variation/:variation_id/review", function($variation_id) use ($app, $db) {
    // Retrieve unit
	$unit = new Unit($variation_id, $db);
    // If unit exists
    if ($unit->exists()) {
        $unit->start_review();
        $app->redirect($app->urlFor('/variation/dash', ['variation_id' => $variation_id]));
    } else {
        $app->redirect('/');
    }
})->name('/variation/review');
