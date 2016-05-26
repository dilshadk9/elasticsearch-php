<?php

require_once 'init.php';

if(isset($_POST) && !empty($_POST)) {

	$blogTitle = $_POST['blogTitle'];
	$blogContent = $_POST['blogContent'];
	$blogKeywords = explode(',', $_POST['blogKeywords']);
	$blogStatus = $_POST['blogStatus'];

	$uniqueIndex = md5(str_replace(' ', '-', $blogTitle));

	$params = [
	    'index' => 'blog',
	    'type' => 'blog',
	    'id' => substr(md5('blog-'.uniqid()),0,10),
	    'body' => [
	    			'blogTitle' => $blogTitle,
	    			'blogContent' => $blogContent,
	    			'blogKeywords' => $blogKeywords
	    		  ]
	];

	try {

		$response = $es->index($params);
		if($response['created']) {
			header('location:./search.php?created=true');
			exit;
		}
		else {
			throw new Exception("Error Processing Request", 1);
		}

	}
	catch (Exception $e) {
		echo '<h2>Error in indexing document</h2>';
		echo '<a href="./">Home</a>';
		exit;
	}

	
}

else {
	die('Direct script access not allowed.');
}