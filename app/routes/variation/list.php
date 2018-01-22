<?php

$app->get("/variation/list(/:permission_code)", function($permission_code = null) use ($app, $db, $constants, $user) {
	$user['navigation']->push(["List", $app->request->getResourceUri()]);
	$data = null;
	if ($user['type'] == "observer") {
		$stmt = $db->query("SELECT * FROM unit WHERE state = 'Complete'");
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	} else {
		$stmt = $db->query("SELECT * FROM unit");
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	$error = null;
	if ($permission_code == "1") {
		$error = "Permission Denied";
	}

	$app->render("/variation/list.twig", $arrayName = array(
		'variations' => $data,
		'schools_abv' => $constants["schools_abv"],
		'error' => $error,
        'user' => $user,
	));


})->name('/variation/list');
