<?php if(is_user_logged_in()): 

 $current_user = wp_get_current_user(); 

?>

    <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php bloginfo('url' );?>/my-cats">Manage Cats</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <!-- Add your nav options here-->
          <li><a href="<?php bloginfo('url');?>/explore">Explore Cats</a></li>
          <li><a href="<?php bloginfo('url');?>/my-cats">My Cats</a></li>
        </ul>     

        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
             <?php echo $current_user->display_name; ?>
             <?php if(get_field('profile_picture', 'user_'.$current_user->ID)): ?>
              <img class="profile_pic" src="<?php the_field('profile_picture', 'user_'.$current_user->ID); ?>" alt="Picture of current user">
             <?php endif; ?>
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
           
              <li><a href="<?php bloginfo('url');?>/account">My Account</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="<?php echo wp_logout_url( get_bloginfo('url') ); ?>">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
</nav>


<?php endif; ?>