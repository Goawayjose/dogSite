<?php 

// dont show this page to a user who is logged in
if(is_user_logged_in()){
    header('Location: '.get_bloginfo('url' ).'/cats');
    exit;
}

get_header(); /* Template Name: Home Page */ ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="jumbotron text-center">
    <h1>Manage all of your Cats</h1>
    <p>WordPress Theme/App to get you started.</p>
    <p>
      <a class="btn btn-lg btn-primary" href="<?php bloginfo('url' );?>/register" role="button">Get Started</a>
    </p>
  </div>

</div> 


<?php endwhile; endif; ?>

<?php get_footer(); ?>

