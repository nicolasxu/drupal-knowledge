<?php
/**

block.tpl.php will apply to block content. but
theme hook suggestions allow you to target
	- region
	- module
	- module_delta, e.g.: block--system--navigation.tpl.php

There are suggestions for 
	1. theme template files
	2. theme functions

Note:
	template suggestion doesn't work on alias path, e.g.: about/team for a node/1 will not work

Template suggestion example:
block
	- block.tpl.php
	- Default block implementation.

block__REGION
	- block--REGION.tpl.php
	- REGION is replaced with the theme region name, and the template targets blocks in that region.

block__MODULE
	- block--MODULE.tpl.php
	- MODULE is replaced with the name of the module that created the block. For example, a template file that targets custom blocks would be block--block.tpl.php and a block created by the menu module would be targeted by using block--menu.tpl.php.

block__MODULE__DELTA
	- block--MODULE--DELTA.tpl.php
	- Target the System module’s Navigation block, you would use block--system--navigation.tpl.php. In this example, “system” is the module and “navigation” is block, and is the delta

*/
/*
// target front page:
   page--front.tpl.php
*/
// below are the code determine template suggestions in template_preprocess_block():

$variables['theme_hook_suggestions'][] = 'block__' . $variables['block']->region;
$variables['theme_hook_suggestions'][] = 'block__' . $variables['block']->module;
$variables['theme_hook_suggestions'][] = 'block__' . $variables['block']->module . '__' . $variables['block']->delta;