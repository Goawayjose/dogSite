<?php 

acf_form_head();
get_header();  /* Template Name: Account Profile Page */ 


// redirect the user id they are not logged in
if ( !is_user_logged_in() ){
  // redirect the user to the login page
  header('Location: '.bloginfo('url').'/login');
}



$error = array(); 

/* If profile was saved, update profile. */
if( isset($_POST['submit'])) {

    // add to require user to fill out
    if( !empty($_POST['user_email'])&& 
        !empty($_POST['first_name'])&&
        !empty($_POST['last_name'])
    ){

        $current_user = wp_get_current_user();
        // update password
        if( !empty($_POST['user_password']) ){
            wp_update_user([
                'ID' => $current_user->ID,
                'user_pass' => esc_attr( $_POST['user_password'] )  
            ]);
        }

        if (!is_email(esc_attr( $_POST['user_email'] )))
            $error[] = __('The Email you entered is not valid.  please try again.', 'profile');
        elseif(email_exists(esc_attr( $_POST['user_email'] )) != $current_user->id )
            $error[] = __('This email is already used by another user.  try a different one.', 'profile');
        else {
            // its good update it
            wp_update_user([
                'ID' => $current_user->ID,
                'user_email' => esc_attr( $_POST['user_email'] )
            ]);
        }

        // update meta fields
        update_user_meta( $current_user->ID, 'first_name', esc_attr($_POST['first_name']));
        update_user_meta( $current_user->ID, 'last_name', esc_attr($_POST['last_name']));


        /* Redirect so the page will show updated info.*/
        if ( count($error) == 0 ) {
            //action hook for plugins and extra fields saving
            wp_redirect( get_permalink() );
            exit;
        }


    } else {
        echo '<div class="alert alert-warning" role="alert">
                <strong>Warning!</strong> All fields are required.
            </div>';
    }
}

?>


<?php 
// show errors if there are some
if ( count($error) > 0 ) echo '<p class="error">' . implode("<br />", $error) . '</p>'; ?>
<div class="row">
    <div class="col-xs-12 col-sm-6">
        <div class="well">

            <h1>Update Password</h1>

            <form method="POST" action="<?php bloginfo('url');?>/account">

            <div class="form-group">
                <label for="first_name">First Name</label>
                <input class="form-control" name="first_name" type="text" id="first_name" value="<?php the_author_meta( 'first_name', $current_user->ID ); ?>" />
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input class="form-control" name="last_name" type="text" id="last_name" value="<?php the_author_meta( 'last_name', $current_user->ID ); ?>" />
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" name="user_email" type="text" id="email" value="<?php the_author_meta( 'user_email', $current_user->ID ); ?>" />
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" name="user_password" type="password" id="password" />
            </div>    


            <?php 
                // action hook for plugin and extra fields
             acf_form([
                'post_id'   => 'user_'.$current_user->ID,
                // you need to change this to match the id of your fields url
                'field_groups' => array(53),
                'form' => false,
                'updated_message' => '',
            ]);
            ?>
            <p class="form-submit">
                <input name="submit" type="submit" class="btn btn-primary" value="Update Profile" />
                <?php wp_nonce_field( 'update-user' ) ?>
                <input name="action" type="hidden" id="action" value="update-user" />
            </p>
            </form>
        </div>
    </div>
</div>


<?php get_footer(); ?>