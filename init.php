<?php
require 'vendor/autoload.php';

use Elasticsearch\ClientBuilder;

$hosts = [
	'127.0.0.1:9200'
];

$es = Elasticsearch\ClientBuilder::create()
	->setHosts($hosts)
	->build();