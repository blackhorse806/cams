<?php

$app->get("/variation/:variation_id/duplicate/:variation_type", function($variation_id, $variation_type) use ($app, $db, $user) {
	echo $variation_type . ":";
	// Retrieve unit
	$unit = new Unit($variation_id, $db);
    // If unit exists
    if ($unit->exists()) {
		if ($variation_type == "unit" || $variation_type == "timetable" || $variation_type == "library") {
	        $new_id = $unit->duplicate($variation_type, $user);
	        if ($new_id) {
	            $app->redirect($app->urlFor('/variation/dash', ['variation_id' => $new_id]));
	            echo "Duplicate to variation_id = " . $new_id;
	        } else {
	            $app->redirect($app->urlFor('/variation/dash', ['variation_id' => $variation_id]));
	            echo "Duplication Failed";
	        }
		} else {
			$app->redirect('/');
		}
    } else {
        $app->redirect('/');
    }
})->name('/variation/duplicate');
