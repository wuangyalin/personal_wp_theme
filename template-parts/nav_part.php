<nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between">
		<div class="container container-fluid">
			<a class="navbar-brand" href="/">Luke Gong</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<?php wp_nav_menu( array( 'theme_location' => 'main_menu' , 'menu_class' => 'nav navbar-nav navbar-right') ); ?>
			</div>
		</div>
	</nav>