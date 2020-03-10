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
    			<div class="row">
    				<img src="<?php echo get_field('personal_picture')['url'];  ?>" width="30%" class="image img-fluid img-circl mx-auto d-block" alt="This is me">
    			</div>
    		</div>

    		<div class="col-sm-12">
    			<div class="row">
    				<div class="profile mx-auto d-block">
    					<span class="resume">
    						<a href="<?php echo get_field('resume_link'); ?>" target="_blank">
    							<i class="fa fa-download fa-4x"></i> Resume
    						</a>
    					</span>
    				</div>
    			</div>
    			<div class="row">
    				<div class="profile mx-auto d-block">
    					<span class="github">
    						<a href="<?php echo get_field('github_link'); ?>" target="_blank">
    							<i class="fa fa-github fa-4x"></i> GitHub
    						</a>
    					</span>
    				</div>
    			</div>
    			<div class="row">
    				<div class="profile mx-auto d-block">
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