<div class="span-2">
	<img src="<?php echo $asset->asset_url('/media/images/chalkboard-64x64.gif') ?>" alt="projects" />
</div>

<div class="about-info span-16 last">
	<h2 class="fancy">Sprint Name Generator</h2>
	
	<p>Select a letter from the list below and suggestions will be shown.</p>

	<h3 id="sprint-letters" class="thin">
	<?php foreach ($letters as $l): ?>
		<a href="/extra/sprint/<?php echo $l ?>"><?php echo strtoupper($l) ?></a>
	<?php endforeach ?>
	</h3>

	<?php if (isset($letter)): ?>
	<p><a href="<?php echo URL::site('/extra/sprint') ?>">Back to sprint name index</a></p>
	<div class="project-info span-16">
		<h5 class="thin positive">Sprint name suggestions for letter "<?php echo strtoupper($letter) ?>"</h5>

		<?php if ($has_list): ?>
			<div id="suggestion-w">

			</div>
			<p>
				<button class="button negative" id="btn-generate">Generate suggestions</button>
			</p>
		<?php else: ?>
			<p class="error">Sorry, no list for this sprint.</p>
		<?php endif ?>
	</div>
	<?php endif ?>
</div>
