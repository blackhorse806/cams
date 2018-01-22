<?php

$app->get("/variation/:variation_id/edit/section3-2", function($variation_id) use ($app, $db, $constants, $user) {
	$user['navigation']->push(["Edit", $app->request->getResourceUri()]);
    $unit = new Unit($variation_id, $db);
	// If unit exists
    if ($unit->exists()) {
        // Render view
        $app->render("/variation/edit/section3-2.twig", $arrayName = array(
            'variation_id' => $variation_id,
            'sessions' => $constants['sessions'],
            'years' => $constants['years'],
            'schools' => $constants['schools'],
            'locations' => $constants['locations'],
            'activity_type' => $constants['activity_type'],
			'user_type' => $user['type'],
			'user' => $user,
        ));
    } else {
        $app->redirect('/');
    }
})->name('/variation/edit/section3-2');
