<div class="span-2">
	<img src="<?php echo $asset->asset_url('/media/images/box-64x64.gif') ?>" alt="tools" />
</div>

<div class="about-info span-22 last">
	<h2 class="fancy">URL Encoder/Decoder</h2>
	
	<div class="project-info span-22 last">
		<h3 class="thin">Encoding/decoding URL parameter values</h3>
		<p>Good for encoding/decoding query parameter values.</p>
		<div id="encode-w" class="span-11">
			<div class="span-11 last">
				<textarea name="encode-uricomp" id="encode-uricomp" rows="5" cols="30"></textarea>
			</div>
			<div class="span-11 last">
				<a href="javascript:void(0);" id="encode-uricomp-btn" class="button positive">Encode</a>
			</div>
		</div>
		<div id="decode-w" class="span-11 last">
			<div class="span-11 last">
				<textarea name="decode-uricomp" id="decode-uricomp" rows="5" cols="30"></textarea>
			</div>
			<div class="span-11 last">
				<a href="javascript:void(0);" id="decode-uricomp-btn" class="button positive">Decode</a>
			</div>
		</div>
	</div>
	
	<div class="project-info span-22 last">
		<h3 class="thin push-down-3">Encoding/decoding URLs</h3>
		<p>Good for encoding/decoding URLs as it preserves the actual URL.</p>
		<div id="encode-w" class="span-11">
			<div class="span-11 last">
				<textarea name="encode-uri" id="encode-uri" rows="5" cols="30"></textarea>
			</div>
			<div class="span-11 last">
				<a href="javascript:void(0);" id="encode-uri-btn" class="button positive">Encode</a>
			</div>
		</div>
		<div id="decode-w" class="span-11 last">
			<div class="span-11 last">
				<textarea name="decode-uricomp" id="decode-uri" rows="5" cols="30"></textarea>
			</div>
			<div class="span-11 last">
				<a href="javascript:void(0);" id="decode-uri-btn" class="button positive">Decode</a>
			</div>
		</div>
	</div>
	
	<div class="span-22 last">
		<p class="push-down-3">Enjoy and share.</p>
	</div>

	<div class="span-22 last">
		<a class="fblike-single" href="http://www.facebook.com/plugins/like.php?href=<?php echo urlencode(URL::site('/extra/tools/urlencode', TRUE)) ?>&amp;layout=standard&amp;show_faces=false&amp;width=450&amp;action=like&amp;font&amp;colorscheme=light&amp;height=35"></a>
	</div>
	
	<div class="span-22 last">
		<g:plusone annotation="inline" href="<?php echo URL::site('/extra/tools/urlencode', TRUE) ?>"></g:plusone>
	</div>
</div>
