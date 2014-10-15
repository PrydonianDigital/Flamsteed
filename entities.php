<?php

date_default_timezone_set('UTC');

require 'tmhOAuth.php';
require 'tmhUtilities.php';

$tmhOAuth = new tmhOAuth(array(
	'consumer_key'    => '5aBR4YOb3eZk6BY3GZ0A',
	'consumer_secret' => 'PUyJ1SrMymjThacm4QlJovktDSFU2GoMe4T3CUqkgw',
	'user_token'      => '5682582-VbEfwQULADRJbW7nK33BdzhEFrTlQRQNG7iWJyIzI',
	'user_secret'     => 'oO1LWdgVi4f4fOjN2wh0ULwMif914Gd5MlQaBiiRA',
));

$code = $tmhOAuth->request('GET', $tmhOAuth->url('1.1/statuses/user_timeline'), array(
	'include_entities' => '1',
	'include_rts'      => '1',
	'screen_name'      => 'Flamsteed',
	'count'            => 10,
));

$timeline = json_decode($tmhOAuth->response['response']);

print json_encode($timeline);

?>
