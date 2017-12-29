<?php get_header(); /* Template Name: Explore Page */ 

// if a form is submitted lets process it
if( isset($_GET['submit']) &&
    // add to require user to fill out
    !empty($_GET['search_term'])){

    // setup a query term
    $search_term = $_GET['search_term'];
}
// no search term
else {
  $search_term = '';
}

?>


<div class="row">
  <div class="col-xs-6">
      <h1>Explore Cats</h1>
      <form action="" method="GET">
        <label for="search_term">Search</label>
        <div class="input-group">
          <input class="form-control" id="search_term" type="text" value="<?php echo $search_term; ?>" placeholder="Search for cats" name="search_term">
          <span class="input-group-btn">
            <input class="btn btn-primary" type="submit" name="submit" value="Search">
          </span>
        </div>
      </form>
  </div>
</div>

<div class="row">

<?php 
// get all of the cats that belong to the user
$cats = new WP_Query([
    // all posts
    'posts_per_page'=>'-1',
    // post type of cats
    'post_type'=>'cat',
    // by the author
    's' => $search_term
]);

if ($cats->have_posts()) : while ($cats->have_posts()) : $cats->the_post(); ?>

    <a class="col-xs-12 mt-40 col-sm-4" href="<?php the_permalink();?>">
      <div class="unit">
        <div class="img_holder">
          <img src="<?php the_field('picture');?>" alt="Picture of cat">
        </div>
      	<p><?php the_title(); ?> / <?php the_author();?></p>
        </div> 
    </a>

<?php endwhile; else: ?>

<div class="col-xs-12 mt-40">
  <div class="well">
    <p>Sorry no Cats matched your search.</p>
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
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create New Cat</h4>
        </div>
        <div class="modal-body">
        <form action="" method="POST">
            
            <label for="cat_title" class="sr-only">Title</label>
            <input class="form-control"  placeholder="Enter cats name" type="text" id="cat_title" name="cat_title">

        </div>
        <div class="modal-footer">
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
           <input type="submit" name="submit" value="Create" class="btn btn-primary btn-lg">
        </form>

         
        </div>
      </div>
      
    </div>
  </div>





<?php get_footer(); ?>

