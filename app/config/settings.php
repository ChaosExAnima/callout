<?php
/**
 * Settings file.
 *
 * Provides array of configuration settings.
 *
 * @package callout
 * @since 1.0.0
 */

namespace Callout;

use Monolog\Logger;

$config = [
	'logger' => [
		'name' => 'app',
		'level' => Logger::DEBUG,
		'path' => $_ENV['APP_DEBUG_PATH'],
	],
	'db' => [
		'driver' => $_ENV['APP_DB_TYPE'],
	],
];

if ( 'sqlite' === $config['db']['driver'] ) {
	$config['db']['database'] = $_ENV['APP_DB_PATH'];
} else {
	$config['db'] = [
		'driver'    => $config['db']['driver'],
		'host'      => $_ENV['APP_DB_HOST'],
		'database'  => $_ENV['APP_DB_NAME'],
		'username'  => $_ENV['APP_DB_USER'],
		'password'  => $_ENV['APP_DB_PASS'],
		'charset'   => 'utf8',
		'collation' => 'utf8_unicode_ci',
		'prefix'    => '',
	];
}

$settings = $app->getContainer()->get( 'settings' );
$settings->replace( $config );
