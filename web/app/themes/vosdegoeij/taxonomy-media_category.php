<?php
$term           =	$wp_query->queried_object;
$data           = Timber::get_context();
$data['images'] = Timber::get_posts(array(
  'post_type'       => 'attachment',
  'post_mime_type'  => 'image',
  'tax_query'       => array(
		array(
			'taxonomy'      => 'media_category',
			'field'         => 'slug',
			'terms'         => $term->slug
		),
	),
  'post_status'     => 'inherit', 
  'orderby'         => 'rand',
  'posts_per_page'  => -1
));
Timber::render('index.twig', $data);