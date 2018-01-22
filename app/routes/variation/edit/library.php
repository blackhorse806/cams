<?php

$app->get("/variation/:variation_id/edit/library", function($variation_id) use ($app, $db, $constants, $user) {
	$user['navigation']->push(["Edit", $app->request->getResourceUri()]);
    $unit = new Unit($variation_id, $db);
	// If unit exists
    if ($unit->exists()) {
        // Render view
        $app->render("/variation/edit/library.twig", $arrayName = array(
            'variation_id' => $variation_id,
            'reading_types' => $constants['reading_types'],
			'sessions' => $constants['sessions'],
			'years' => $constants['years'],
			'user' => $user,
        ));
    } else {
        $app->redirect('/');
    }
})->name('/variation/edit/library');
