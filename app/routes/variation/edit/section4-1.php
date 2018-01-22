<?php

$app->get("/variation/:variation_id/edit/section4-1", function($variation_id) use ($app, $db, $constants, $user) {
	$user['navigation']->push(["Edit", $app->request->getResourceUri()]);
    $unit = new Unit($variation_id, $db);
	// If unit exists
    if ($unit->exists()) {
        // Render view
        $app->render("/variation/edit/section4-1.twig", $arrayName = array(
            'variation_id' => $variation_id,
            'schools' => $constants['schools'],
			'user_type' => $user['type'],
			'user' => $user,
        ));
    } else {
        $app->redirect('/');
    }
})->name('/variation/edit/section4-1');
