<?php 
  function my_enqueue_scripts() {
      wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/main.js', array('jquery'), '', true);
      
      $image_urls = [
          get_template_directory_uri() . "/images/FV-img01.jpg",
          get_template_directory_uri() . "/images/FV-img02.jpg",
          get_template_directory_uri() . "/images/FV-img03.jpg"
      ];
      wp_localize_script('custom-js', 'themeData', array('images' => $image_urls));
  }
  add_action('wp_enqueue_scripts', 'my_enqueue_scripts');
?>