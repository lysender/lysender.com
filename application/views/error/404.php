<div class="span12">
	<h1><strong>404 Error:</strong> Page not found</h1>
	
	<p>The requested page <?php echo HTML::anchor($requested_page, $requested_page) ?> is not found.</p>
	
	<p>It is either not existing, moved or deleted. 
	Make sure the URL is correct. </p>
	
	<p>To go back to the previous page, click the Back button.</p>
	
	<p><a href="<?php echo URL::site('/', true) ?>">If you wanted to go to the main page instead, click here.</a></p>
</div>