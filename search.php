<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Elasticsearch - PHP</title>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
</head>
<body>
<!-- Navbar static top -->
<div class="navbar navbar-default navbar-static-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Elasticsearch - PHP - Blog Example</a>
    </div>
    <div class="navbar-collapse collapse">
      <!-- Right nav -->
      <ul class="nav navbar-nav navbar-right">
        <li><a href="./">Create New</a></li>
        <li class="active"><a href="./search.php">Search</a></li>
      </ul>
  
    </div><!--/.nav-collapse -->
  </div><!--/.container -->
</div>
<div class="container master-container">
<div class="row">
<div class="col-md-12">
  <div class="panel panel-info">
    <div class="panel-heading">Elasticsearch - PHP</div>
    <div class="panel-body">
    <?php if((isset($_GET['deleted']) && $_GET['deleted']) || (isset($_GET['created']) && $_GET['created'])) { ?>
    <div class="alert alert-success fade in" style="margin-top:18px;">
	    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
	    <strong>Success!</strong> Document deleted successfully.
	</div>
	<?php } ?>
  <form role="form" action="./search.php" method="get">
  <div class="form-group">
    <label class="control-label" for="blogTitle">Keywords</label>
    <input type="text" class="form-control" name="q" id="q" placeholder="Enter keywords separated by comma (,)" value="<?php echo !empty($_GET['q']) ? $_GET['q']: '';?>">
    <p class="help-block">Please enter keywords separated by comma (,)</p>
  </div>

  <button type="submit" class="btn btn-default">Search</button>
</form>

  <?php

	require_once 'init.php';

	if(isset($_GET['q'])) {

		if(!empty($_GET['q'])) {

			$q = $_GET['q'];
			$params = [
		    'index' => 'blog',
		    'type' => 'blog',
		    'body' => [
		        'query' => [
		        	'bool' => [
		        		'should' => [
			        		'match' => ['blogTitle' => $q],
					        'match' => ['blogContent' => $q],
					        'match' => ['blogKeywords' => $q]
		        		]
		        	]
		          ]
			    ]
			];
		}
		else {
			$params = [
		    'index' => 'blog',
		    'type' => 'blog',
			];
		}

		$response = $es->search($params);
	?>
	<h2> Search Result </h2>
	<table id="es-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
	        <thead>
	            <tr>
	            	<th>Id</th>
	                <th>Title</th>
	                <th>Content</th>
	                <th>Keywords</th>
	                <th>Action</th>
	            </tr>
	        </thead>
	        <tfoot>
	            <tr>
	            	<th>Id</th>
	                <th>Title</th>
	                <th>Content</th>
	                <th>Keywords</th>
	                <th>Action</th>
	            </tr>
	        </tfoot>
	        <tbody>
	        <?php
	        	if($response['hits']['total'] >= 1) {
					$results = $response['hits']['hits'];
				}

				if(isset($results)) {

					foreach($results as $r) {
				?>
				<tr>
		        	<td><?php echo $r['_id']; ?></td>
		        	<td><?php echo $r['_source']['blogTitle']; ?></td>
		        	<td><?php echo $r['_source']['blogContent']; ?></td>
		        	<td><?php echo implode(',', $r['_source']['blogKeywords']); ?></td>
		        	<td><a href="action.php?id=<?php echo $r['_id']; ?>&action=delete" onclick="return confirm('Are you sure you want to delete?');">Delete</a></td>
	        	</tr>
				<?php		

					}

				}
	        ?>
	        
	   </tbody>
	 </table>

	<?php } ?>

    </div>
  </div>
</div>
</div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    	$('#es-table').DataTable({
    		"bFilter": false
    	});
	} );
</script>
</body>
</html>

