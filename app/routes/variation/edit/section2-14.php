<?php

$app->get("/variation/:variation_id/edit/section2-14", function($variation_id) use ($app, $db, $user) {
	$user['navigation']->push(["Edit", $app->request->getResourceUri()]);
    $unit = new Unit($variation_id, $db);
	// If unit exists
    if ($unit->exists()) {
        // Render view
        $app->render("/variation/edit/section2-14.twig", $arrayName = array(
            'variation_id' => $variation_id,
			'user_type' => $user['type'],
			'user' => $user,
        ));
    } else {
        $app->redirect('/');
    }
})->name('/variation/edit/section2-14');
