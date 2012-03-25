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

			<div class="span11" id="workdclock-widget-w">
				<h2 class="thin">This is the clock.</h2>
			</div>
			
			<div class="span11">
				<form class="form-horizontal">
					<fieldset>
						<legend>Add a new world clock widget</legend>
						<div class="control-group">
							<label class="control-label">Select region</label>
							<div class="controls" id="region-select-w">
								<select id="regions" name="regions"></select>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Select timezone</label>
							<div class="controls">
								<select id="timezone" name="timezone" disabled="disabled"></select>
							</div>
						</div>
						<div class="form-actions">
							<input type="button" name="add-tz" id="add-tz" class="btn btn-primary icon-plus" value="Add new clock" disabled="disabled" />
						</div>
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