<link rel="icon" href="admin/images/BFC.png" type="image/png" sizes="16x16">
<?php
	session_start();
    	
	require_once "includes/session_control.php";
	require_once "includes/db_connect.php";

	include "templates/header.php";
	//include "templates/nav.php";
?>

    <main role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="" style="padding-top: 50px">
        <div class="container">
          <h1 class="display-3">Compose New Article</h1>
        </div>
      </div>
      <div class="container">
        <!-- Example row of columns -->

      <div class="row">
       
        <div class="row">
          <div class="col-md-8">
            <h2>Compose New Article</h2>
<form method = "POST" action = "data_process/processes.php" autocomplete = "off" accept-charset="UTF-8">
    <div class="form-group">
		<label for="article_authorId">Author</label>
    <!-- 
    The input below will just display the current user's full name in a disabled input field. A way to show the person submitting data the author in cation
    -->        
        <input placeholder="Enter your Author" class="form-control form-control-md" type="text" id="article_authorId" disabled value = "<?php print $_SESSION["control"]["fullName"]; ?>" />
    <!-- 
    The input below will capture a hidden value of the current user's ID (primary key). The trick is, this ID will be submitted together with the rest of the new article's information. The ID will be as well inserted in the article table as a reference to the users' table to identify the author.
    -->
		<input name="article_authorId" type="hidden" id="article_authorId" value = "<?php print $_SESSION["control"]["userId"]; ?>" />
	</div>
    <div class="form-group">
		<label for="article_title">Article Title</label>
		<input placeholder="Enter your Article Title" class="form-control form-control-md" name="article_title" type="text" id="article_title" required />
	</div>
    <div class="form-group">
		<label for="article_full_text">Article Full Text</label>
		<textarea placeholder="Enter the Article Full Text" class="form-control form-control-md" name="article_full_text" id="article_full_text" required style="height:170px" ></textarea>
	</div>
<!--    <div class="form-group">-->
<!--		<label for="article_photo">Article Photo</label>-->
<!--		<input placeholder="Upload Article Photo" class="form-control form-control-md" name="article_photo" type="file" id="article_photo" />-->
<!--	</div>-->
    <div class="form-group">
		<label for="article_publication_date">Publication Date</label>
		<input placeholder="Enter your Article Title" class="form-control form-control-md" name="article_publication_date" type="date" id="article_publication_date" />
	</div>
    <div class="form-group">
		<input class="btn btn-primary" style="margin-top: 5px" type="submit" name="save_article"  value="Save Article">
	</div>
</form>
          </div>
          <div class="col-md-4">
            <h2>View Existing Articles</h2>
<!--            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>-->
            <p style="padding-left: 5px"><a class="btn btn-info "  href="view_art.php" role="button">View Blogs &raquo;</a></p>
          </div>
        </div>
     
	</div>
      </div> <!-- /container -->
<?php
	include "templates/footer.php";
?>