<?php
/**
 * The template for displaying the front page
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Steffen_Sten
 */

get_header();
?>

<? require get_template_directory() . '/components/frontpage/hero.php'; ?>
<? require get_template_directory() . '/components/frontpage/latestposts.php'; ?>
<? require get_template_directory() . '/components/frontpage/inspiration.php'; ?>

<?php

get_footer();
