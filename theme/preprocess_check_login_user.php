<?php 
// method 1 (in preprocess function):
if ($variables['user']->uid) {
	// current user is loggin user
}

// method 2 (in template file):
if(user_is_logged_in()){ print "Logged In"; }


