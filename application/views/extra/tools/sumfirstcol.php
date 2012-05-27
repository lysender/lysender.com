<div class="row">
	<div class="span1">
		<img src="<?php echo $asset->asset_url('/media/images/box-64x64.gif') ?>" alt="tools" />
	</div>
	
	<div class="about-info span11">
		<div class="row">
	
			<div class="span11">
				<h2 class="fancy"><a href="<?php echo URL::site('/extra/tools/sumfirstcol', TRUE) ?>">Sum First Column of File</a></h2>
			</div>
	
			<div class="project-info span11">
				<div class="row">
					<div class="span11">
						<h3 class="thin">Sum first column of a file like hourly error logs</h3>
						<p>Paste the contents of the file or emailed logs to the textarea below then click "Sum it up" button.</p>
					</div>
					<div class="span11">
						<textarea class="span11" name="texttosum" id="texttosum" rows="12" cols="80"></textarea>
					</div>
					<div class="span11">
						<a href="javascript:void(0);" id="sumitup" class="btn btn-primary">Sum it up!</a>
						<a href="javascript:void(0);" id="clearitup" class="btn">Clear</a>
					</div>
					<div class="span11">
						<p class="push-down-3">Result</p>
						<textarea class="span5" name="sumresult" id="sumresult" rows="3" cols="80"></textarea>
					</div>
				</div>
			</div>
			
			<div class="span11">
				<p class="push-down-3">For comments and suggestions, <a href="http://blog.lysender.com/2012/05/sum-first-column-of-a-file-python-script/">see the blog post</a>. Enjoy and share.</p>
			</div>
		
			<div class="span11">
				<a class="fblike-single" href="http://www.facebook.com/plugins/like.php?href=<?php echo urlencode(URL::site('/extra/tools/base64', TRUE)) ?>&amp;layout=standard&amp;show_faces=false&amp;width=450&amp;action=like&amp;font&amp;colorscheme=light&amp;height=35"></a>
			</div>
			
			<div class="span11">
				<g:plusone annotation="inline" href="<?php echo URL::site('/extra/tools/base64', TRUE) ?>"></g:plusone>
			</div>
		</div><!-- row -->
	</div><!-- span11 -->
</div><!-- span12 -->