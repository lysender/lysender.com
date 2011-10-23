<div class="span-2">
	<img src="<?php echo URL::site('/media/images/briefcase_64.png') ?>" alt="projects" />
</div>

<div class="about-info span-16 last">
	<h2 class="fancy">Projects</h2>
	
	<p>For almost three (3) years in web development, Lysender develops and
	maintains the following projects:</p>

	<h3 class="thin">Pet Projects</h3>
	
	<div class="project-info span-16">
		<h5 class="thin positive">1. Google Chrome Timein Timeout Extension</h5>
		
		<p>Google Chrome extension that reminds you to time-in and time-out.
		This is especially helpful when your company uses a computerized/networked
		time-in and time-out system.</p>
		
		<p>Learn more about the <a href="<?php echo URL::site('/projects/chrome-time-in-time-out') ?>">extension</a>.</p>
	</div>
	
	<h3 class="thin">Company Projects</h3>
	
	<div class="project-info span-16">
		<h5 class="thin positive">1. TECHTUIT - Barcode labeling and inventory tracking</h5>

		<p>Running for more than two years already, this barcode labeling and
		inventory tracking system is built in Zend Framework and MySQL for Techtuit Philippines. 
		The application keeps track of SD card chips and MP3 player items from sevaral production
		stages. Using PECL's print extensions, the application is able to print
		barcode labels to SATO barcode printers for each client.</p>

		<p>It also saves shipment data into an Excel file using PEAR's Spreadsheet
		Writer package.</p>

		<div class="project-images span-16" id="techtuit-project-images">
			<ul>
			<?php foreach ($project_images['techtuit'] as $image): ?>
				<li>
					<a href="<?php echo URL::site('/media/images/portfolio/techtuit/'.$image) ?>">
						<img src="<?php echo URL::site('/media/images/portfolio/techtuit/'.$image) ?>" alt="Techtuit project image" />
					</a>
				</li>
			<?php endforeach ?>
			</ul>
		</div>
	</div>

	<div class="project-info span-16">
		<h5 class="thin positive">2. Rajatours - Administration panel</h5>

		<p>As a team member, Lysender develops the administration panel for the
		Rajahtours online reservation system. The panel has a custom built Content
		Management System written in Zend Framework that allows the administrators
		to edit contents, prices, upload pictures, accept or deny reservation and
		the like.</p>

		<p>Currently, the project is handled by another team as new features are
		requested by the client and Lysender has been assigned to other projects.</p>
		
		<div class="project-images span-16" id="rajahtours-project-images">
			<ul>
			<?php foreach ($project_images['rajahtours'] as $image): ?>
				<li>
					<a href="<?php echo URL::site('/media/images/portfolio/rajahtours/'.$image) ?>">
						<img src="<?php echo URL::site('/media/images/portfolio/rajahtours/'.$image) ?>" alt="Rajahtours project image" />
					</a>
				</li>
			<?php endforeach ?>
			</ul>
		</div>
	</div>

	<div class="project-info span-16">
		<h5 class="thin positive">3. Daito - Retail Management</h5>

		<p>An ordering and retail management system for a Japan based company - Daito. Most of
		the application parts includes items, prices and shipping information. It also
		included reports printing for sales and delivery.</p>

		<p>Uses Zend Framework and MS SQL Server 2005. Lysender is part of the team
		and usually do some of the modules on it.</p>

		<div class="project-images span-16" id="daito-project-images">
			<ul>
			<?php foreach ($project_images['daito'] as $image): ?>
				<li>
					<a href="<?php echo URL::site('/media/images/portfolio/daito/'.$image) ?>">
						<img src="<?php echo URL::site('/media/images/portfolio/daito/'.$image) ?>" alt="Daito project image" />
					</a>
				</li>
			<?php endforeach ?>
			</ul>
		</div>
	</div>

	<div class="project-info span-16">
		<h5 class="thin positive">4. Manken - Comic Manager</h5>

		<p>Online Manga store. It is a conversion of the existing system written in
		ASP MSSQL and is converted to PHP MySQL. It is a small application that tracks
		comic book reservation.</p>

		<div class="project-images span-16" id="manken-project-images">
			<ul>
			<?php foreach ($project_images['manken'] as $image): ?>
				<li>
					<a href="<?php echo URL::site('/media/images/portfolio/manken/'.$image) ?>">
						<img src="<?php echo URL::site('/media/images/portfolio/manken/'.$image) ?>" alt="Manken project image" />
					</a>
				</li>
			<?php endforeach ?>
			</ul>
		</div>
	</div>

	<div class="project-info span-16">
		<h5 class="thin positive">5. Others not listed</h5>
		<p>Others not listed are either personal projects or maintenance projects
		only or projects that has NDA (non-disclosure agreement). For personal projects,
		I usually write them on my
		<?php echo HTML::anchor('http://blog.lysender.com/', 'blog') ?>.</p>
	</div>
</div>
