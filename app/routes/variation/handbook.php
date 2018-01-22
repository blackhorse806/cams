<?php

$app->get("/variation/:variation_id/handbook", function($variation_id) use ($app, $db) {
	// if ($id === "1") {
	// 	$variation = array(
	// 		'id' => '1',
	// 		'type' => 'unit',
	// 		'code' => '300766',
	// 		'name' => 'Hydrology',
	// 		'owner' => 'Thomas Nixon',
	// 		'state' => 'Edit'
	// 	);
	// }
	// if ($id === "1") {
	$unit = new Unit($variation_id, $db);
	$variation = $unit->attribute('core')->get();
	$equivalent = $unit->attribute('equivalent')->get();
	$prerequisite = $unit->attribute('prerequisite')->get();
	$offerings = $unit->attribute('offerings')->get();
	$courses = $unit->attribute('courses')->get();
	$accreditation = $unit->attribute('accreditation')->get();

		$app->render("/variation/handbook.twig", $arrayName = array(
			'variation' => $variation,
			'variation_id' => $variation_id,
			'equivalent' => $equivalent,
			'prerequisite' => $prerequisite,
			'offerings' => $offerings,
			'courses' => $courses,
			'accreditation' => $accreditation
		));
	// } else {
	// 	echo "No variation";
	// }

})->name('/variation/handbook');
