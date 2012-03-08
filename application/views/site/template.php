<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title><?php echo ( ! empty($title)) ? $title.' :: ' : '' ?>Lysender</title>
	
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="robots" content="all" />
	
<?php if (isset($description) && $description): ?>
<meta name="description" content="<?php echo $description ?>" />
<?php endif ?>
	
<?php if (isset($keywords) && $keywords): ?>
<meta name="keywords" content="<?php echo $keywords ?>" />
<?php endif ?>

<link rel="shortcut icon" href="<?php echo URL::site('/favicon.ico?v='.APP_VERSION, true) ?>" />

<!-- basic styles -->
<?php foreach ($styles as $style => $media)
	echo HTML::style($style.'?v='.APP_VERSION, array('media' => $media)), "\n" ?>

<!--[if IE]>
<?php echo HTML::style($asset->asset_url('/media/css/ie.css?v='.APP_VERSION), array('media' => 'screen, projection')) ?>
<![endif]-->

<script type="text/javascript">
//<![CDATA[
	var base_url = '<?php echo URL::site('/', true) ?>';
//]]>
</script>
	
<?php if (Kohana::$environment == Kohana::DEVELOPMENT && Kohana::$profiling): ?>
<!-- Profiler Styles -->
<style type="text/css">
	<?php include Kohana::find_file('views', 'profiler/style', 'css') ?>
</style>
<?php endif ?>
</head>

<body>
<div id="header" class="container">
	<?php echo $header ?>
</div>

<div id="content" class="container">
	<?php echo $content ?>
</div>
	
<div id="footer" class="container">
	<?php echo $footer ?>
</div>

<!-- basic scripts -->
<?php foreach ($scripts as $script)
	echo HTML::script($script.'?v='.APP_VERSION), "\n" ?>

<script type="text/javascript">
//<![CDATA[
	<?php
		if (isset($head_scripts) && $head_scripts) {
			echo $head_scripts."\n";
		}
	?>
	$(function(){
		<?php
			if (isset($head_readyscripts) && $head_readyscripts) {
				echo $head_readyscripts."\n";
			}
		?>
	});
//]]>
</script>

<?php if (isset($show_google_plusone) && $show_google_plusone): ?>
<script type="text/javascript">
	$(window).load(function(){
		var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
		po.src = 'https://apis.google.com/js/plusone.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
	});
</script>
<?php endif ?>

<?php if (isset($show_facebook_like) && $show_facebook_like): ?>
<script type="text/javascript">
	$(window).load(function(){
		$(".fblike-single").each(function(){
			var t = $(this);
			var info = t.attr("href");
			t.replaceWith("<iframe src='" + info + "' scrolling=\"no\" frameborder=\"0\" style=\"border:none; overflow:hidden; width:450px; height:35px;\" allowTransparency=\"true\"></iframe>");
		});
	});
</script>
<?php endif ?>

<?php if (Kohana::$environment == Kohana::PRODUCTION): ?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-7713082-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<!-- Start Quantcast tag -->
<script type="text/javascript">
_qoptions={
qacct:"p-514yFKdjDiF72"
};
</script>
<script type="text/javascript" src="http://edge.quantserve.com/quant.js"></script>
<noscript>
<div style="display: none;">
	<img src="http://pixel.quantserve.com/pixel/p-514yFKdjDiF72.gif" alt="Quantcast" />
</div>
</noscript>
<!-- End Quantcast tag -->
<?php endif ?>
</body>
</html>
