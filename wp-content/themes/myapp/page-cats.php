<?php /* Template Name: Cats Page */ 

acf_form_head(); // make sure to add this when doing acf
get_header(); 


?>





<div class="row">
    
<div class="col-xs-12">
    <h1>My Cats
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create_cat">
        New Cat
     </button>
    </h1>
</div>
<?php 
// get all of the cats that belong to the user
$cats = new WP_Query([
    // all posts
    'posts_per_page'=>'-1',
    // post type of cats
    'post_type'=>'cat',
    // by the author
    'author' => get_current_user_id()
]);

if ($cats->have_posts()) : while ($cats->have_posts()) : $cats->the_post(); ?>

    <a class="col-xs-12 mt-40 col-sm-4" href="<?php the_permalink();?>">
      <div class="unit">
        <div class="img_holder">
          <img src="<?php the_field('picture');?>" alt="Picture of cat">
        </div>
        <p><?php the_title(); ?></p>
        </div> 
    </a>

<?php endwhile; else:?>

<div class="col-xs-12">
  <div class="well">
    <p>You have not added any cats.</p>
  </div>
</div>

<?php endif; ?>
</div>


 <!-- Modal -->
  <div class="modal fade" id="create_cat" role="dialog">
    <div class="modal-dialog modal-sm">
    
      <!-- Modal content-->
      <div class="modal-content">

       <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Create Cat</h4>
      </div>

        <div class="modal-body">
        <?php
  
          // well ain't this some magic
          acf_form([
            'post_id'   => 'new_post',
            'post_title'  => true,
            'post_content'  => false,
            'submit_value' => 'Create',
            'updated_message' => 'Cat Added',
            'html_submit_button' => '<input type="submit" class="btn btn-primary" value="%s" />',
            'new_post'    => [
              'post_type'   => 'cat',
              'post_status' => 'publish'
            ]
          ]);
          
          ?>
         
        </div>
      </div>
      
    </div>
  </div>





<?php get_footer(); ?>

