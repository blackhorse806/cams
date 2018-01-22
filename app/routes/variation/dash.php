<?php

$app->get("/variation/:variation_id/dash", function($variation_id) use ($app, $db, $constants, $user) {
    $user['navigation']->push(["Dash", $app->request->getResourceUri()]);
	// Retrieve unit
	$unit = new Unit($variation_id, $db);
    // If unit exists
    if ($unit->exists()) {
        // Get core unit details
        $variation = $unit->attribute('core')->get();
		$editors = $unit->attribute('editors')->get();
        $sessions = $unit->get_sessions();

		// Check is user is an observer and that the variation is not completed
		if ($user['type'] == "observer" && $variation['state'] != "Complete") {
			$app->redirect($app->urlFor("/variation/list"));
		}

		// Check that a unit coordinator is an editor if not complete
		if ($user['type'] == "uc" && $variation['state'] != "Complete") {
			// Check user is an editor
			if (!$unit->is_editor($user['userid'])) {
				$app->redirect($app->urlFor("/variation/list", array('permission_code' =>'1')));
			}
		}

        // Render view
        $app->render("/variation/dash.twig", $arrayName = array(
            'variation' => $variation,
            'variation_id' => $variation_id,
            'years' => $constants['years'],
            'sessions' => $sessions,
            'user' => $user,
			'editors' => $editors,
        ));
    } else {
        $app->redirect('/');
    }
})->name('/variation/dash');
