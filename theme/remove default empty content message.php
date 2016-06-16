<?php 

// https://www.drupal.org/node/1049290

// best way to do it:
if(!empty($page['content'])) : 

 if(drupal_is_front_page()) {
    unset($page['content']['system_main']['default_message']);
    }
 print render($page['content']); 
 endif; 
