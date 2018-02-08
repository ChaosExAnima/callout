<?php
/**
 * Dependencies injection.
 *
 * @package callout
 * @since 1.0.0
 */

namespace Callout;

use Slim\Container;

use Illuminate\Database\Capsule\Manager;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\LineFormatter;

/**
 * Database manager.
 *
 * @param Container $container Container reference.
 * @return Manager
 */
function db( Container $container ) : Manager {
	$capsule = new Manager;
	$capsule->addConnection( $container['settings']['db'] );

	$capsule->setAsGlobal();
	$capsule->bootEloquent();

	return $capsule;
}

/**
 * Logger manager.
 *
 * @param Container $container Container reference.
 * @return Logger
 */
function logger( Container $container ) : Logger {
	$settings = $container->get( 'settings' )['logger'];
	$logger = new Logger( $settings['name'] );

	$formatter = new LineFormatter(
		"[%datetime%] [%level_name%]: %message%\n",
		null,
		true,
		true
	);

	$stream = new StreamHandler( $settings['path'] );
	$stream->setFormatter( $formatter );

	$logger->pushHandler( $stream );

	return $logger;
}

$container = $app->getContainer();

$container['db'] = __NAMESPACE__ . '\\db';
$container['logger'] = __NAMESPACE__ . '\\logger';
