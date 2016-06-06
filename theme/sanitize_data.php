<?php


// We can sanitize data in the preprocess function by running it through 
// check_plain, 
// check_markup, 
// filter_xss_admin


// example:

function template_preprocess_poll_bar(&$variables) {
  if ($variables['block']) {
    $variables['theme_hook_suggestions'][] = 'poll_bar__block';
  }
  $variables['title'] = check_plain($variables['title']);
  $variables['percentage'] = round($variables['votes'] * 100 / max($variables['total_votes'], 1));
}