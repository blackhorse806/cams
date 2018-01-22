<?php

$app->get("/variation/uc_list", function() use ($app, $db, $constants, $user) {
	$user['navigation']->push(["List", $app->request->getResourceUri()]);
	$data = null;
	$stmt = $db->query("SELECT * FROM unit_editors e join unit u on e.unit_id = u.unit_id where e.userid = '" . $user['userid'] . "'");
	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$app->render("/variation/uc_list.twig", $arrayName = array(
		'variations' => $data,
		'schools_abv' => $constants["schools_abv"],
		'user' => $user,
	));


})->name('/variation/uc_list');
