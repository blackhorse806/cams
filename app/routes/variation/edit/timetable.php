<?php

$app->get("/variation/:variation_id/edit/timetable", function($variation_id) use ($app, $db, $constants, $user) {
	$user['navigation']->push(["Edit", $app->request->getResourceUri()]);
    $unit = new Unit($variation_id, $db);
	// If unit exists
    if ($unit->exists()) {
        // Render view
        $app->render("/variation/edit/timetable.twig", $arrayName = array(
            'variation_id' => $variation_id,
            'reading_types' => $constants['reading_types'],
			'sessions' => $constants['sessions'],
			'locations' => $constants['locations'],
			'activity_type' => $constants['activity_type'],
			'years' => $constants['years'],
			'user' => $user,
        ));
    } else {
        $app->redirect('/');
    }
})->name('/variation/edit/timetable');
