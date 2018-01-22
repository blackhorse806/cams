<?php

$app->get("/variation/create", function() use ($app, $db, $constants, $user) {
	$user['navigation']->push(["Create", $app->request->getResourceUri()]);
	// Render view
	$app->render("/variation/create.twig", $arrayName = array(
		'schools' => $constants['schools'],
		'user' => $user,
	));
})->name('/variation/create');

$app->post("/variation/create_variation", function() use ($app, $db, $user) {

	// Get data from post
	$data = json_decode($app->request->post('data'),true);

	// Check there is data
	if ($data == null) {
		echo "Failed";
		return;
	}
	// Check data is valid
	if (!(isset($data['unit_code']) && isset($data['unit_name']) && isset($data['school']))) {
		echo "Failed";
		return;
	}


    // Create new unit
	$unit = new Unit(null, $db);
    $variation_id = $unit->create($user);

	$unit = new Unit($variation_id, $db);
	// Set values
	$unit->attribute('core')->save_attribute('unit_code', $data['unit_code']);
	$unit->attribute('core')->save_attribute('unit_name', $data['unit_name']);
	$unit->attribute('core')->save_attribute('school', $data['school']);

    echo "success";

})->name('/variation/create_variation');
