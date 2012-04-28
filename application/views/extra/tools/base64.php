<div class="row">
	<div class="span1">
		<img src="<?php echo $asset->asset_url('/media/images/box-64x64.gif') ?>" alt="tools" />
	</div>
	
	<div class="about-info span11">
		<div class="row">
	
			<div class="span11">
				<h2 class="fancy"><a href="<?php echo URL::site('/extra/tools/base64', TRUE) ?>">Base64 Encoder/Decoder</a></h2>
			</div>
	
			<div class="project-info span11">
				<div class="row">
					<div class="span11">
						<h3 class="thin">Base64 encoder/decoder for the lazy ones</h3>
						<p>Enter the string to encode or decode to the right box. The encoded/decoded value will be displayed on the opposite box.</p>
					</div>
					<div class="span11">
						<div class="row">
							<div id="encode-w" class="span5">
								<div class="row">
									<div class="span5">
										<textarea class="span5" name="base64-encode" id="base64-encode" rows="5" cols="30"></textarea>
									</div>
									<div class="span5">
										<a href="javascript:void(0);" id="base64-encode-btn" class="btn btn-primary">Encode</a>
									</div>
								</div>
							</div>
							<div id="decode-w" class="span5">
								<div class="row">
									<div class="span5">
										<textarea class="span5" name="base64-decode" id="base64-decode" rows="5" cols="30"></textarea>
									</div>
									<div class="span5">
										<a href="javascript:void(0);" id="base64-decode-btn" class="btn btn-primary">Decode</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="span11">
				<p class="push-down-3">For comments and suggestions, <a href="http://blog.lysender.com/2012/04/yet-another-base64-encoderdecoder/">see the blog post</a>. Enjoy and share.</p>
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