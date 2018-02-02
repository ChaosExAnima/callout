<?php
/**
 * Dependencies injection.
 *
 * @package callout
 * @since 1.0.0
 */

namespace Callout;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\LineFormatter;

$container = $app->getContainer();

$container['logger'] = function( $container ) {
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
};
