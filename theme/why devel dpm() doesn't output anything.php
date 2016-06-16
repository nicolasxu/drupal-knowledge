<?php 


// http://drupal.stackexchange.com/questions/24217/dpm-does-not-display-any-results-on-screen


/*

Make sure you have print $messages; in your page.tpl.phptemplate file. By default, devel (dpm) is configured to print it's content in the message area of the site. So if your template for some reason does not render the contents of $messages, you won't see anything.

*/