<?php
/**
 * Template Name: Home page
 *
 * Template for displaying home static page
 *
 * @package understrap
 */

get_header();
?>
<body>
<header>
	<?php get_template_part('template-parts/nav_part'); ?>
</header>

<div class="">
	<!-- Show Three js banner !-->
	<div id="banner"></div>
	<!-- Show Three js banner end !-->
	<?php get_template_part('template-parts/about_us'); ?>
	<?php get_template_part('template-parts/services'); ?>
	<?php get_template_part('template-parts/myworks_part'); ?>
	<?php get_template_part('template-parts/contact_part'); ?>
</div><!-- Wrapper end -->

<?php get_footer(); ?>

<script>

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