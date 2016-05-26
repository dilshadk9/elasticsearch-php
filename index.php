<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Elasticsearch - PHP</title>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
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
        <li class="active"><a href="./">Create New</a></li>
        <li><a href="./search.php">Search</a></li>
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
  <form role="form" action="saveBlog.php" method="post">
  <div class="form-group">
    <label class="control-label" for="blogTitle">Blog Title</label>
    <input type="text" class="form-control" name="blogTitle" id="blogTitle" placeholder="Enter Blog Title" required>
    <p class="help-block">Please enter blog title</p>
  </div>

  <div class="form-group">
    <label class="control-label" for="blogContent">Blog Content</label>
    <textarea class="form-control"  name="blogContent" id="blogContent" placeholder="Blog Content" required=""></textarea>
    <p class="help-block">Please enter blog content</p>
  </div>

  <div class="form-group">
    <label class="control-label" for="blogTitle">Blog Keywords</label>
    <input type="text" class="form-control" name="blogKeywords" id="blogKeywords" placeholder="Keywords separated by comma (,)" required="">
    <p class="help-block">Please enter keywords separated by comma (,)</p>
  </div>

  <div class="form-group">
    <label class="control-label">Blog Status</label>
    <div class="radio">
      <label>
        <input type="radio" name="blogStatus" id="blogStatus1" value="1" checked="">
        Active
      </label>
    </div>
    <div class="radio">
      <label>
        <input type="radio" name="blogStatus" id="blogStatus2" value="0">
        Inactive
      </label>
    </div>
    <p class="help-block">Please blog status</p>
  </div>

  <button type="submit" class="btn btn-default">Create Blog</button>
</form>

    </div>
  </div>
</div>
</div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>