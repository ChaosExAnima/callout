<?php
/**
 * Routes configuration.
 *
 * @package callout
 * @since 1.0.0
 */

namespace Callout;

$app->get( '/', function( $request, $response, $args ) {
	$response->getBody()->write( 'Welcome to Callout ' . CALLOUT_VERSION );

	return $response;
} );
