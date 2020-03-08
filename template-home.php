<?php
/**
 * Template Name: Home page
 *
 * Template for displaying home static page
 *
 * @package understrap
 */

get_header();
$personal_pic = get_field('personal_picture');
?>
<body>
<header>
		<nav class="navbar navbar-default">
		<div class="container container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Luke Gong</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<?php wp_nav_menu( array( 'theme_location' => 'main_menu' , 'menu_class' => 'nav navbar-nav navbar-right') ); ?>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
		</nav>
</header>
 <?php //wp_nav_menu( array( 'theme_location' => 'main_menu' , 'menu_class' => 'nav navbar-nav') ); ?>

<div class="">
	<!-- Show Three js banner !-->
	<div id="banner"></div>
	<!-- Show Three js banner end !-->
			<section id="about">
				<div class="container">
					<div class="row">
								<div class="col-sm-12">
									<h2 class="title">About me</h2>
								</div>
								<div class="col-sm-12">
									<div class="row">
										<div class="col-sm-12 text-left">
											<?php echo get_field('about_us') ?>
										</div>
									</div>
								</div>

								<div class="col-sm-12">

								</div>
								<div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3 mt-big">
									<div class="row">
										<br><br>
										<img src="<?php echo $personal_pic['url'];  ?>" width="100%" class="image img-circl" alt="This is me - IT worker">
										<br><br>
									</div>
								</div>
								
								<div class="col-sm-12">
									<div class="row">
										<div class="profile">
											<span class="resume">
												<a href="<?php echo get_field('resume_link'); ?>" download="">
													<i class="fa fa-download fa-4x"></i> Resume
												</a>
											</span>
										</div>
									</div>
									<div class="row">
										<div class="profile">
											<span class="github">
												<a href="<?php echo get_field('github_link'); ?>" target="_blank">
													<i class="fa fa-github fa-4x"></i> GitHub
												</a>
											</span>
										</div>
									</div>
									<div class="row">
										<div class="profile">
											<span class="resume">
												<a href="https://www.linkedin.com/in/xun-gong-32a5b6103/" target="_blank">
													<i class="fa fa-linkedin fa-4x"></i> Linkedin
												</a>
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
		<section id="services" class="text-gradient">
						<div class="container">
								<div class="col-md-12">
										<h2 class="title" >WHAT I CAN DO</h2>
										<div class="row services">
												<div class="col-md-4" >
														<div class="icon"><i class="fa fa-html5"></i>
														</div>
														<?php echo get_field('service_1') ?>
												</div>
												<div class="col-md-4" >
														<div class="icon"><i class="fa fa-mobile"></i>
														</div>
														<?php echo get_field('service_2') ?>
												</div>
												<div class="col-md-4" >
														<div class="icon"><i class="fa fa-database"></i>
														</div>
														<?php echo get_field('service_3') ?>
												</div>
										</div>
										<hr>
										<div class="text-center">
												<p class="lead">Would you like to know more or just discuss something?</p>
												<p><a href="#contact" class="btn btn-default btn-lg scrollTo">Contact me</a>
												</p>
												
										</div>
										
								</div>
								<!-- /.12 -->
						</div>
						<!-- /.container -->
		</section>
		<section id="works">
						<div class="container">
								<div class="col-md-12">
										<h2 class="title" >MY WORKS</h2>
										<p>More my works are on my <a href="<?php echo get_field('github_link'); ?>" target="_blank">GitHub</a></p>
										<br><br>
									</div>
							<?php get_template_part('template-parts/myworks_part'); ?>
						</div>
		</section>
		<section id="contact">
			<div class="container">
				<div class="col-md-12">
					<h2 class="title"> Contact Me </h2>
						<div class="row">
							<div class="col-md-8">
								<?php echo do_shortcode('[contact-form-7 id="22" title="Contact form 1"]'); ?>
							</div>
							<div class="col-md-4">
								<div class="col-md-12">
									<label class="labels"> <i class="fa fa-user"></i>  Xun Gong   </label>
								</div>
								<div class="col-md-12">
									<label class="labels"> 
										<i class="fa fa-envelope"></i> 
										<a href="mailto:master@lukegong.com">master@lukegong.com   </a>
									</label>
								</div>
								<div class="col-md-12">
									<label class="labels">
										<i class="fa fa-phone"></i> 
										<a href="tel:+61425920818">0425920818 </a>  
									</label>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
</div><!-- Wrapper end -->
<?php get_footer(); ?>

<script>
	window.slide = new SlideNav();

	// external js: isotope.pkgd.js
	// init Isotope
	var $grid = $('.project_gallery').isotope({
		itemSelector: '.element-item',
		layoutMode: 'fitRows',

	});

	// bind filter button click
	$('.filters-button-group').on( 'click', 'button', function() {
		var filterValue = $( this ).attr('data-filter');
		// use filterFn if matches value
		$grid.isotope({ filter: filterValue });
	});
	// change is-checked class on buttons
	$('.button-group').each( function( i, buttonGroup ) {
		var $buttonGroup = $( buttonGroup );
		$buttonGroup.on( 'click', 'button', function() {
			$buttonGroup.find('.is-checked').removeClass('is-checked');
			$( this ).addClass('is-checked');
		});
	});
 </script>

</body>
</html>