<div class="span-2">
	<img src="<?php echo $asset->asset_url('/media/images/letter_64.png') ?>" alt="contact" />
</div>

<div class="about-info span-16 last">
	<h2 class="fancy">Contact</h2>
	
	<p>Because of some web host limitations, Lysender cannot setup a mailer script
	for this site. However, you can directly send email to lysender at:<br />
	<br />
	<?php echo HTML::mailto('leonel@lysender.com') ?><br />
	<br />
	or send tweets to:<br />
	<br />
	<?php echo HTML::anchor('http://twitter.com/lysender','Twitter') ?></p>
	
	<p>Lysender usually hangs out at: <br />
	<br />
	<?php echo HTML::anchor('http://friendfeed.com/lysender', 'Friendfeed') ?></p>
</div>