<?php get_header(); /* Template Name: Login Page */ ?>

<div class="row">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    
    <div class="col-xs-12 col-sm-4 col-sm-offset-4">
        <div class="well">
            <h1>Login</h1>
            <?php the_content(); ?>
        </div>
        <p>Dont have an account? <a href="<?php bloginfo('url');?>/register">Register</a></p>

    </div>

<?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>

