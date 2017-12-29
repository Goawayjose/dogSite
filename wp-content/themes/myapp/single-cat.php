<?php 
acf_form_head(); // make sure to add this when doing acf
get_header(); ?>



<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php 
// only show the button if the user is the creator
if($current_user->ID == $post->post_author){ ?>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_cat">
        Edit Cat
    </button>

    
  <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this Cat?')" href="<?php echo get_delete_post_link( $post->ID ) ?>">Delete Cat</a></p>

<?php } ?>

<div class="row">
    <div class="col-xs-12">
        <h1><?php the_title(); ?></h1>
        <img src="<?php the_field('picture'); ?>" alt="">
    </div>

    <div class="col-xs-12">
        <strong>Size:</strong> <?php the_field('size'); ?>
    </div>

</div>






<?php
// only show the modal if the user is the creator
if($current_user->ID == $post->post_author){ ?>
 <!-- Edit Modal -->
  <div class="modal fade" id="edit_cat" role="dialog">
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
            'post_title'  => true,
            'post_id' => get_the_id(),
            'submit_value' => 'Update',
            'updated_message' => 'Cat Updated',
            'html_submit_button' => '<input type="submit" class="btn btn-primary" value="%s" />',
          ]);
          
          ?>
         
        </div>
      </div>
      
    </div>
  </div>
<?php } ?>




<?php endwhile; endif; ?>


<?php get_footer(); ?>