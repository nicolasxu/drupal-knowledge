<?php


/**
 * Implements template_preprocess_region().
 */
function bartikLearnerTheme_preprocess_region(&$variables) {
  $region = $variables['region'];
 
  // Sidebars and content area need a good class to style against. You should
  // not be using id's like #main or #main-wrapper to style contents.
  if (in_array($region, array('sidebar_first', 'sidebar_second', 'content'))) {
    $variables['classes_array'][] = 'main';
  }
  // Add a "clearfix" class to certain regions to clear floated elements inside them.
  if (in_array($region, array('footer', 'help', 'highlight'))) {
    $variables['classes_array'][] = 'clearfix';
  }
  // Add an "outer" class to the darker regions.
  if (in_array($region, array('header', 'footer', 'sidebar_first', 'sidebar_second'))) {
    $variables['classes_array'][] = 'outer';
  }
}


/**
 * Implements template_preprocess_node().
 */
function dgd7_preprocess_node(&$variables) {
  // Give the <h2> containing the teaser node title a better class.
  $variables['title_attributes_array']['class'][] = 'node-title';
 
  // Remove the "Add new comment" link when the form is below it.
  if (!empty($variables['content']['comments']['comment_form'])) {
    hide($variables['content']['links']['comment']);
  }
 
  // Make some changes when in teaser mode.
  if ($variables['teaser']) {
    // Don't display author or date information.
    $variables['display_submitted'] = FALSE;
    // Trim the node title and append an ellipsis.
    $variables['title'] = truncate_utf8($variables['title'], 70, TRUE, TRUE);
  } 
}

/**
 * Implements template_preprocess_user_picture().
 * - Add "change picture" link to be placed underneath the user image.
 */
function dgd7_preprocess_user_picture(&$variables) {
  // Create a variable with an empty string to prevent PHP notices when
  // attempting to print the variable.
  $variables['edit_picture'] = '';
 
  // The account object contains the information of the user whose photo is
  // being processed. Compare that to the user id of the user object which    
  // represents the currently logged in user.
  if ($variables['account']->uid == $variables['user']->uid) {
    // Create a variable containing a link to the user profile, with a class
    // "change-user-picture" to style against with CSS.
    $variables['edit_picture'] = l('Change picture', 'user/' . $vars['account']->uid . '/edit',
      array(
        'fragment' => 'edit-picture',
        'attributes' => array('class' => array('change-user-picture')),
      )
    ); 
  }
  /*
    Printing your custom variable Into the user-picture.tpl.php file, 
    which you’ve copied into your theme to override
    <?php if ($user_picture): ?>
      <div class="user-picture">
        <?php print $user_picture; ?>
        <?php print $edit_picture; ?>
      </div>
    <?php endif; ?>
  */
}

