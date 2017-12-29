<?php 

// if a form is submitted lets process it
if( isset($_POST['submit']) &&
    // add to require user to fill out
    !empty($_POST['user_email'])&& 
    !empty($_POST['user_password'])){


    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];


    $user_id = username_exists( $user_email );

    // check to see if the user already exists
    if ( ! $user_id ) {
        
        // create the user
        wp_create_user( $user_email, $user_password, $user_email );

        // login the user
         $creds = array(
            'user_login'    => $user_email,
            'user_password' => $user_password,
            'remember'      => true
        );
     
        $user = wp_signon( $creds, false );

        // redirect the user to the cats page
        header('Location: '.bloginfo('url').'/cats');
     

    } else {
        echo '<div class="alert alert-danger">User already exists.</div>';
    }
}

get_header(); /* Template Name: Register Page */ ?>


<div class="row">
    <div class="col-xs-12 col-sm-6 col-sm-offset-3">
        <div class="well">
            <h1>REGISTER</h1>
            <form action="" method="POST">
                <label for="email" class="sr-only">Email</label>
                <input class="form-control" type="email" name="user_email" placeholder="Enter email" value="">

                <label for="password" class="sr-only">Password</label>
                <input class="form-control" type="password" name="user_password" placeholder="enter password" value="">
                <br>
                <input type="submit" class="btn btn-primary" name="submit" value="Submit">

            </form>
        </div>
        <p>Already have an account? <a href="<?php bloginfo('url');?>/login">Login</a></p>
    </div>
</div>        



<?php get_footer(); ?>

