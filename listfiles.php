<?php
	$path = NULL;

	if (isset($_POST['path']) && $_POST['path'])
	{
		$path = $_POST['path'];
	}	

	function list_dir_contents($dir)
	{
		if ( ! is_dir($dir))
		{
			echo "Directory $dir cannot be accessed<br/ >";
		}

		$h = opendir($dir);

		if ($h)
		{
			while (FALSE !== ($file = readdir($h)))
			{
				if ($file != '.' && $file != '..')
				{
					echo "$file<br />";
				}
			}
		}
	}
?>
<html>
<head><title>Dir listings</title></head>
<body>
<h1>File lister</h1>
<?php
	if ($path !== NULL)
	{
		echo '<h2>Files inside '.$path.'</h2>';
		echo '<pre>'.list_dir_contents($path).'</pre>';
	}
?>
<h2>Enter path</h2>
<form action="listfiles.php" method="post">
<input type="text" name="path" />
<input type="submit" name="submit" value="submit" />
</form>
</body>
</html>