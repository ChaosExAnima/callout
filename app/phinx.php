<?php
/**
 * Phinx configuration file.
 *
 * @package callout
 */

$dotenv = new Dotenv\Dotenv( __DIR__ );
$dotenv->load();

$adapter = $_ENV['APP_DB_TYPE'];
$db_env  = [];

if ( 'sqlite' === $adapter ) {
	$db_env = [
		'adapter' => $adapter,
		'name'    => $_ENV['APP_DB_PATH'],
	];
} else {
	$db_env = [
		'adapter'   => $adapter,
		'host'      => $_ENV['APP_DB_HOST'],
		'name'      => $_ENV['APP_DB_NAME'],
		'user'      => $_ENV['APP_DB_USER'],
		'pass'      => $_ENV['APP_DB_PASS'],
		'charset'   => 'utf8',
		'collation' => 'utf8_unicode_ci',
	];
}

return [
	'paths' => [
		'migrations' => __DIR__ . '/migrations',
		'seeds'      => __DIR__ . '/seeds',
	],
	'environments' => [
		'default_database' => 'default',
		'default'          => $db_env,
	],
];
