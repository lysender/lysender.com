<div class="span-2">
	<img src="<?php echo $asset->asset_url('/media/images/portfolio/chrome-tito/64.png') ?>" alt="projects" />
</div>

<div class="about-info span-16 last">
	<h2 class="fancy">Google Chrome Time-in Time-out Extension</h2>
	
	<div class="project-info span-16">
        <p>Google Chrome extension that reminds you to time-in and time-out.
        This is especially helpful when your company uses a computerized/networked
        time-in and time-out system.</p>
        
        <h5 class="thin positive">Installation</h5>
        
        <p><a href="http://www.lysender.com/chrome-timein-timeout/chrome-timein-timeout.crx">To install the extension, click here.</a></p>
        
        <p>After installing the extension, go to Tools -&gt; Extensions and look for
        the Time-in Time-out extension and click options. Set the Time-in and timeout
        time and leave the Activated checkbox checked. </p>
        
        <div class="project-images span-16" id="chrome-tito-project-images">
            <ul>
            <?php foreach ($project_images['chrome-tito'] as $image): ?>
                <li>
                    <a href="<?php echo $asset->asset_url('/media/images/portfolio/chrome-tito/'.$image) ?>">
                        <img src="<?php echo $asset->asset_url('/media/images/portfolio/chrome-tito/'.$image) ?>" alt="Techtuit project image" />
                    </a>
                </li>
            <?php endforeach ?>
            </ul>
        </div>
        <div class="clear"></div>
        
        <h5 class="thin positive">Contact</h5>
        
        <p>Source code extension is available in Github. View the source at:<br />
        <a href="https://github.com/lysender/chrome-time-in-time-out">https://github.com/lysender/chrome-time-in-time-out</a>.</p>
        
        <p>For feedbacks, suggestions and bug reports, please send an email to <?php echo HTML::mailto('leonel@lysender.com') ?></p>
        
        <h5 class="thin positive">Credits</h5>
        
        <p>Original code based on Google Chrome Notification samples.</p>
        
        <p>Icons by KDE Artwork team.</p>
	</div>    
</div>
