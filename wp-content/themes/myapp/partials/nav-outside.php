<?php if(!is_user_logged_in()): ?>

    <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php bloginfo('url' );?>">Manage Cats</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <!-- add additional nav if needed -->
        </ul>

        <ul class="nav navbar-nav navbar-right">
          <li><a href="<?php bloginfo('url' );?>/login">Login</a></li>

        </ul>
      </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
</nav>

<?php endif; ?>
