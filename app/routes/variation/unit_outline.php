<?php

$app->get("/variation/:variation_id/uo/:session/:year", function($variation_id, $session, $year) use ($app, $db, $user) {
	$user['navigation']->push(["Outline", $app->request->getResourceUri()]);
    // Retrieve unit
	$unit = new Unit($variation_id, $db);
    // If unit exists
    if ($unit->exists()) {
        // $sessions = $unit->get_sessions();
        // foreach ($sessions as $session) {
            //echo $session . "<br>";
        $modes = $unit->get_modes_of_delivery($session);
        foreach ($modes as $value) {
            //echo $value['mode'] . ": " . $value['hours'] . "<br>";
        }
            //echo "<br>";
        //}

        $app->render("/variation/unit_outline.twig", $arrayName = array(
            'variation_id' => $variation_id,
            'variation' => $unit->attribute('core')->get(),
            'session' => $session,
            'year' => $year,
            'modes' => $modes,
            'prerequisite' => $unit->attribute('prerequisite')->get(),
            'corequisite' => $unit->attribute('corequisite')->get(),
            'incompatible' => $unit->attribute('incompatible')->get(),
            'outcomes' => $unit->attribute('outcomes')->get(),
            'assessments' => $unit->attribute('assessments')->get(),
            'readings' => $unit->attribute('readings')->get(),
			'user' => $user,
        ));
    }
})->name('/variation/uo');
