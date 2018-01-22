<?php

$app->get("/user/edit", function() use ($app, $db, $constants, $user) {
		$user['navigation']->push(["User", $app->request->getResourceUri()]);
        // Render view
		$data = null;
		$stmt = $db->query("SELECT * FROM user ORDER BY name ASC");
		if ($stmt != false) {
			$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		$staffid = [];
		$staffname = [];
		foreach ($data as $key => $value) {
			if ($user["type"] == "developer") {
				$staff[] = ["id" => $value['id'], "name" => $value['name'], "type" => $value['type'], "email" => $value['email']];
				$stafflookup[$value['id']] = ["name" => $value['name'], "type" => $value['type']];
			} else {
				if ($value['type'] != "developer") {
					$staff[] = ["id" => $value['id'], "name" => $value['name'], "type" => $value['type'], "email" => $value['email']];
					$stafflookup[$value['id']] = ["name" => $value['name'], "type" => $value['type']];
				}
			}
		}

        $app->render("/edit_user.twig", $arrayName = array(
			'stafflookup' => $stafflookup,
			'staff' => $staff,
			'user' => $user,
        ));
        // $app->redirect('/');
})->name('/user/edit');

$app->post("/user/save", function() use ($app, $db, $user) {
	// Get id and type from post
	$id = json_decode($app->request->post('id'),true);
	$type = json_decode($app->request->post('type'),true);
	$name = json_decode($app->request->post('name'),true);

	// Update user
	$stmt = $db->prepare("UPDATE user SET type=?, name=? WHERE id=?");
	$stmt->bindParam(1, $type);
	$stmt->bindParam(2, $name);
	$stmt->bindParam(3, $id);
	$stmt->execute();

	// Send response
	echo "success";

})->name('/user/save');
