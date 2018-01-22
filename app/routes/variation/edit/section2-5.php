<?php

$app->get("/variation/:variation_id/edit/section2-5", function($variation_id) use ($app, $db, $constants, $user ) {
	$user['navigation']->push(["Edit", $app->request->getResourceUri()]);
    $unit = new Unit($variation_id, $db);
	// If unit exists
    if ($unit->exists()) {
        // Render view
        $app->render("/variation/edit/section2-5.twig", $arrayName = array(
            'variation_id' => $variation_id,
            'sessions' => $constants['sessions'],
			'modes' => $constants['modes'],
			'modes' => $constants['modes'],
			'outcomes' => $unit->attribute('outcomes')->get(),
			'user_type' => $user['type'],
			'user' => $user,
        ));
    } else {
        $app->redirect('/');
    }
})->name('/variation/edit/section2-5');
