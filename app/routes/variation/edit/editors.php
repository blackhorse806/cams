<?php

$app->get("/variation/:variation_id/edit/editors", function($variation_id) use ($app, $db, $constants, $user) {
	$user['navigation']->push(["Editors", $app->request->getResourceUri()]);
    $unit = new Unit($variation_id, $db);
	// If unit exists
    if ($unit->exists()) {
        // Render view
		$data = null;
		$stmt = $db->query("SELECT * FROM user");
		if ($stmt != false) {
			$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		$staffid = [];
		$staffname = [];
		foreach ($data as $key => $value) {
			$staffid[] = $value['id'];
			$staffname[] = $value['name'];
			$staff[$value['id']] = $value['name'];
		}

        $app->render("/variation/edit/editors.twig", $arrayName = array(
            'variation_id' => $variation_id,
			'staffid' => $staffid,
			'staffname' => $staffname,
			'staff' => $staff,
			'user' => $user,
        ));
    } else {
        $app->redirect('/');
    }
})->name('/variation/edit/editors');
