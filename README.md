## Synopsis

This project is an intoduction to Elasticsearch with PHP. With the help of Elasticsearch you can index, search, update and delete the documents. You can improve your search functionality of your websites using Elasticsearch. For more information, please follow the below link.

https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/_quickstart.html

## Installation

Minimum PHP version - 5.4.0

Please install the composer - A Dependency Manager for PHP using following link:

https://getcomposer.org/download/

When you right click inside the folder you installed this project, you will see Use Composer here.

To install all the dependencies - Run the below command:

	composer update

Download the Elasticserch server using the following link:

https://www.elastic.co/downloads/elasticsearch

Run the below command to start the server.

	For windows user:
	bin\elasticsearch

	For Linux user:
	sudo /etc/init.d/elasticsearch start

## Code Example

Initializing the Elasticsearch:

	require 'vendor/autoload.php';
	use Elasticsearch\ClientBuilder;
	$hosts = [
		'127.0.0.1:9200'
	];
	$es = Elasticsearch\ClientBuilder::create()
		->setHosts($hosts)
		->build();

Index a document:

	$params = [
		    'index' => 'my_index',
		    'type' => 'my_type',
		    'id' => 'my_id'
		    'body' => [
		    			'blogTitle' => 'title',
		    			'blogContent' => 'content',
		    			'blogKeywords' => 'elasticsearch, php'
		    		  ]
		];

	$response = $es->index($params);	

Get a document:

	$params = [
	    'index' => 'my_index',
	    'type' => 'my_type',
	    'id' => 'my_id'
	];

	$response = $es->index($params);	

Search for a document:

	$params = [
	    'index' => 'my_index',
	    'type' => 'my_type',
	    'body' => [
	        'query' => [
	        	'bool' => [
	        		'should' => [
		        		'match' => ['blogTitle' => 'title'],
				        'match' => ['blogContent' => 'content'],
				        'match' => ['blogKeywords' => 'elasticsearch, php']
	        		]
	        	]
	          ]
		    ]
		];

	  $response = $es->search($params);

Delete a document:

	$params = [
		    'index' => 'my_index',
		    'type' => 'my_type',
		    'id' => 'my_id'
		];

	$response = $es->delete($params);

## Motivation

This project with give you the roadmap to get start with Elasticsearch using PHP.
