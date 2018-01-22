<?php

$app->get("/", function() use ($app) {
	if (isset($_SESSION['username'])) {
		$app->redirect($app->urlFor('/home'));
	} else {
		$app->render("login.twig", ['root' => 'true']);
	}
})->name('/');

$app->post("/login", function() use ($app, $db) {
	if (isset($_SESSION['username'])) {
		$app->redirect($app->urlFor('/home'));
	} else {
		// Get login details
		$username = $app->request->post('username');
		$password = $app->request->post('password');
		// To protect MySQL injection for Security purpose
		$username = stripslashes($username);
		$password = stripslashes($password);

		if ($password == "") {
			$app->redirect($app->urlFor('/'));
			return;
		}

		if ($username == "uc") {
			// Start the session and send user to home page
			$_SESSION['name'] = "Demo Unit Coordinator";
			$_SESSION['userid'] = "123456";
			$_SESSION['type'] = "uc";
			$_SESSION['navigation'] = new Navigation;
			$app->redirect($app->urlFor('/home'));

			// Failed login goes back to login page
			$app->redirect($app->urlFor('/'));
			return;
		}

		// Check credentials
		$valid = false;

		// try {
		// 	// Check if user authenticates with ldap
		// 	$ldapserver = 'ad.uws.edu.au';
		// 	$domain = '@ad.uws.edu.au';
		// 	$base_dn = 'ou=Staff,ou=people,DC=AD,DC=UWS,DC=EDU,DC=AU';
		// 	// Connect to server
		// 	$ldap_conn = ldap_connect($ldapserver);
		// 	ldap_set_option($ldap_conn, LDAP_OPT_PROTOCOL_VERSION, 3);
		// 	ldap_set_option($ldap_conn, LDAP_OPT_REFERRALS, 0);
		// 	$userfound = ldap_bind($ldap_conn, $username . $domain, $password);
		// 	// Failed login goes back to login page
		// 	if (!$userfound) {
		// 		$app->redirect($app->urlFor('/'));
		// 		return;
		// 	}
		// } catch (Exception $e) {
		// 	echo 'Caught exception: ',  $e->getMessage(), "\n";
		// 	$app->redirect($app->urlFor('/'));
		// 	return;
		// }

		// Check user is in database
		$data = null;
		$stmt = $db->prepare('SELECT * FROM user WHERE id=?');
		if ($stmt != false) {
			$stmt->bindParam(1, $username);
			$stmt->execute();
			$data = $stmt->fetch(PDO::FETCH_ASSOC);
			if ($data) {
				$valid = true;
			} else {
				// // Add user to db if doesn't exist
				// // Get data from ldap server
				// $filter = 'cn='. $username;
				// $attributes = array("cn", "sn", "displayname", "mail");
				// $result = ldap_search($ldap_conn, $base_dn, $filter, $attributes);
				// $data = ldap_get_entries($ldap_conn, $result);
				// if (!$data || $data == false) {
				// 	$app->redirect($app->urlFor('/'));
				// 	return;
				// }
				// $user = [];
				// $user['name'] = $data[0]["displayname"][0];
				// $user['email'] = $data[0]["mail"][0];
				// $user['id'] = $data[0]["cn"][0];
				// // Insert new user into database
				// $stmt = $db->prepare('INSERT INTO user(id, name, email, type) VALUES(?, ?, ?, ?)');
				// if ($stmt != false) {
				// 	$stmt->bindParam(1, $username);
				// 	$stmt->bindParam(2, $user['name']);
				// 	$stmt->bindParam(3, $user['email']);
				// 	$stmt->bindParam(4, null);
				// 	$stmt->execute();
				// }
			}
		}

		// Figure out type of user
		$type = "observer";
		// Check if uc
		if ($data['type'] == "uc") {
			$type = "uc";
		}
		// Check if admin
		if ($data['type'] == "admin") {
			$type = "admin";
		}
		// Check if developer
		if ($data['type'] == "developer") {
			$type = "developer";
		}

		// Start the session and send user to home page
		if ($valid) {
			$_SESSION['name'] = $data['name'];
			$_SESSION['userid'] = $data['id'];
			$_SESSION['type'] = $type;
            $_SESSION['navigation'] = new Navigation;
			$app->redirect($app->urlFor('/home'));
		}

		// Failed login goes back to login page
		$app->redirect($app->urlFor('/'));
	}
})->name('/login');

$app->get("/logout", function() use ($app) {
	// remove all session variables
	session_unset();

	// destroy the session
	session_destroy();

	$app->redirect($app->urlFor('/'));
})->name('/logout');
