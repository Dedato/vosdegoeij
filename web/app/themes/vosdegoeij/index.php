<?php
$data           = Timber::get_context();
$data['post']   = new TimberPost();
$data['images'] = Timber::get_posts(array(
  'post_type'       => 'attachment', 
  'post_mime_type'  => 'image', 
  'post_status'     => 'inherit', 
  'orderby'         => 'rand',
  'posts_per_page'  => -1
));

Timber::render('index.twig', $data);