<div class="row">
	<div class="span1">
		<img src="<?php echo $asset->asset_url('/media/images/box-64x64.gif') ?>" alt="tools" />
	</div>
	
	<div class="about-info span11">
		<div class="row">
	
			<div class="span11">
				<h2 class="fancy">World Clock</h2>
				
				<p>This tool allows you to define your word clock widget as many as you like and display them for quick reference.<br />
				The widgets created are saved so that they will be displayed on your next visit.</p>
			</div>
			
			<div class="span11">
				<h2 id="clock">This is the clock.</h2>
			</div>
			
			<div class="span11">
				<h3 class="thin">Add a new world clock widget</h3>
				
				<p>Add now!</p>
				
				<form class="form-horizontal">
					<fieldset>
						<legend>Add a new World Clock Widget</legend>
						<?php foreach ($tzlist as $region => $list): ?>
						<div class="control-group">
							<label class="control-label"><?php echo $region ?></label>
							<div class="controls">
								<select>
								<?php foreach ($list as $tz => $offset): ?>
									<option><?php echo $tz ?></option>
								<?php endforeach ?>
								</select>
							</div>
						</div>
						<?php endforeach ?>
					</fieldset>
				</form>
			</div>
			
			<div class="span11">
				<p class="push-down-3">Enjoy and share.</p>
			</div>
		
			<div class="span11">
				<a class="fblike-single" href="http://www.facebook.com/plugins/like.php?href=<?php echo urlencode(URL::site('/extra/tools/worldclock', TRUE)) ?>&amp;layout=standard&amp;show_faces=false&amp;width=450&amp;action=like&amp;font&amp;colorscheme=light&amp;height=35"></a>
			</div>
			
			<div class="span11">
				<g:plusone annotation="inline" href="<?php echo URL::site('/extra/tools/worldclock', TRUE) ?>"></g:plusone>
			</div>
		</div><!-- row -->
	</div><!-- span11 -->
</div><!-- span12 -->