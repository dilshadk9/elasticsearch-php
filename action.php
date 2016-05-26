<?php
require_once 'init.php';

if(isset($_GET['action'])) {

	if($_GET['action'] == 'delete' && !empty($_GET['id'])) {

		$params = [
		    'index' => 'blog',
		    'type' => 'blog',
		    'id' => $_GET['id']
		];

		try {
			$response = $es->delete($params);
			if($response['found']) {
				header('location:./search.php?deleted=true');
				exit;
			}
			else {
				throw new Exception("Error Processing Request", 1);
				
			}
		}
		catch(Exception $e) {
			echo '<h2>Error in reading document id</h2>';
			echo '<a href="./">Home</a>';
			exit;
		}
		
	}

}

