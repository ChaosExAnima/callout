<?php
/**
 * Callout main entry.
 *
 * A PHP anonymous reporting app.
 *
 * @package callout
 */

define( 'CALLOUT_VERSION', '1.0.0' );

require '../vendor/autoload.php';

$dotenv = new Dotenv\Dotenv( __DIR__ );
$dotenv->load();

$app = new Slim\App( [
	'settings' => [
		'displayErrorDetails' => $_ENV['APP_DEBUG'],
	],
] );

require 'config/settings.php';
require 'config/dependencies.php';
require 'config/routes.php';

$app->run();
