<?php
  $my_projects = getProjects();
?>
<div class="row">
  <div class="col-md-12 button-group filters-button-group">
    <button class="button gallery_button is-checked" data-filter="*">All</button>
    <button class="button gallery_button" data-filter=".Web">Websites</button>
    <button class="button gallery_button" data-filter=".Mobile">Mobile</button>
    <button class="button gallery_button" data-filter=".WebGL">WebGL</button>
  </div>
</div>
<div class="row project_gallery">
    <?php
    $project_count = 0;
    foreach($my_projects as $project):
      $title = get_the_title($project->ID);
      $description = get_field('description',$project->ID);
      $category = get_field('category',$project->ID);
      $image = get_field('image', $project->ID);
      $project_link = get_field('project_link',$project->ID);
      $contribution_description = get_field('contribution_description',$project->ID);
      $contribution_count = get_field('contribution_count',$project->ID);
      ?>
      <div class=" col-lg-3 col-md-4 col-sm-6 col-xs-12 element-item transition <?php echo $category;?>" data-toggle="modal" data-target="#myModal-<?php echo $project_count; ?>">
        <div class="gallery_product">
          <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $alt; ?>" class="img-responsive gallery_image">
          <div class="gallery_overlay">
            <span class="overlay_title">+</span>
          </div>
        </div>
        <hr>
        <h7 class="galley_title"><?php echo $title; ?></h7>
      </div>
      <div id="myModal-<?php echo $project_count; ?>" class="modal modal-admin fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-body">
                  <div class="row">
                    <div class="col-md-12 flex-xs-middle fixed_box"><img src="<?php echo $image['url']; ?>" class="img-responsive"></div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <h3><?php echo $title; ?></h3>
                      <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#description-<?php echo $project_count; ?>" role="tab">Description</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#contribution-<?php echo $project_count; ?>" role="tab">Contribution</a>
                          </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                          <div class="tab-pane active" id="description-<?php echo $project_count; ?>" role="tabpanel"><?php echo $description; ?></div>
                          <div class="tab-pane" id="contribution-<?php echo $project_count; ?>" role="tabpanel"><?php echo $contribution_description; ?></div>
                        </div>  
                        <div class="progress">
                          <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="<?php echo $contribution_count; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $contribution_count; ?>%"><?php echo $contribution_count; ?>%</div>
                        </div>
                      <br>
                      <?php if($project_link): ?>
                      <div class="bg-inverse text-white"><a href="<?php echo $project_link; ?>" type="button"  target="_blank">See Project</a></div>
                      <?php endif; ?>
                    </div>
                  </div>
              </div>
          </div>
        </div>
      </div>
    <?php  $project_count++;  endforeach; ?>
</div>