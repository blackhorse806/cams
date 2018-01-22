<?php

require '../vendor/autoload.php';
require '/lib/Generate.php';
require '/lib/Unit.php';
require '/lib/Helper.php';
require '/lib/Navigation.php';

$constants = [];
$constants['sessions'] = ["Autumn","Spring","1H","2H","Quarter 1","Quarter 2","Quarter 3","Quarter 4","Term 1","Term 2","Term 3","Summer A","Summer B"];
$constants['locations'] = ["Bankstown","Campbelltown","Hawkesbury","Parramatta","Penrith","Lithgow","Nirimba","Online"];
$constants['activity_type'] = ["Class","Clinic","Field Trip","Lecture","Lecture Tutorial","Online Class","Online Lecture","Online Lecture Tutorial","Online Seminar","Online Tutorial","Practical","Seminar","Skills Session","Tutorial","Workshop","vUWS"];
$constants['schools'] = ["School of Business","School of Computing, Engineering and Mathematics","School of Education","School of Humanities and Communication Arts","School of Law","School of Medicine","School of Nursing and Midwifery","School of Science and Health","School of Social Sciences and Psychology"];
$constants['reading_types'] = ["Prescribed Textbook", "Essential Reading", "Additional Reading"];
$constants['years'] = ["2016", "2017", "2018", "2019", "2020", "2021", "2022", "2023"];
$constants['levels'] = ["Foundation Studies and Preparatory units (The College) Level Z", "Undergraduate Level 1", "Undergraduate Level 2", "Undergraduate Level 3", "Undergraduate Level 4", "Undergraduate Honours Level 5", "Postgraduate Level 7"];
$constants['modes'] = ["Online", "Composite", "External", "Internal"];
$constants['schools_abv'] = array(
	"School of Business" => "SoB",
	"School of Computing, Engineering and Mathematics" => "SCEM",
	"School of Education" => "SoE",
	"School of Humanities and Communication Arts" => "HCA",
	"School of Law" => "SoL",
	"School of Medicine" => "SoM",
	"School of Nursing and Midwifery" => "SoNM",
	"School of Science and Health" => "SSH",
	"School of Social Sciences and Psychology" => "SSP"
);

// Start session
session_start();
$user = null;
if (isset($_SESSION)) {
	$user = [];
	$user['type'] = '';
	$user['name'] = '';
	$user['userid'] = '';
	$user['email'] = '';
	$user['search'] = '';
	$user['results'] = '';
    $user['navigation'] = null;

	foreach ($_SESSION as $key => $value) {
		if (isset($user[$key])) {
			$user[$key] = $value;
		}
	}

    if (isset($_SESSION['navigation'])) {
        $user['navigation'] = $_SESSION['navigation'];
    }


}

// Configure the template directory and the template parser.
$app = new \Slim\Slim(array(
    'view' => new \Slim\Views\Twig(),
    'templates.path' => '../app/views',
	'user' => $user
));

// Set the view to use Twig templates
$view = $app->view();
$view->parserOptions = array(
    'debug' => true
    // 'cache' => dirname(__FILE__) . '/cache'
);
$view->parserExtensions = array(
    new \Slim\Views\TwigExtension(),
);


// Load the ini config file
$app->config = parse_ini_file("../app/config.ini");

// Set PhpWord settings
use PhpOffice\PhpWord\Settings;
Settings::setOutputEscapingEnabled(true);

// Connect to database
$db = new PDO(
	"mysql:host=" . $app->config['db_host'] .
	";dbname=" . $app->config['db_name'],
	$app->config['db_user'],
	$app->config['db_pass'],
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")
);

// Redirect all traffic for no session to home page
if (!isset($_SESSION['type'])) {
	require('../app/routes/login.php');
	// Catch all traffic
	$app->get("/:stuff+", function($stuff) use ($app) {
		$app->redirect($app->urlFor("/"));
	});
	// Keep for urlFor in login
	$app->post("/home", function() use ($app) {
	})->name('/home');
} else {
	// Routes file
	require('../app/routes.php');
}

// Run the application.
$app->run();
