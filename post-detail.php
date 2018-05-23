<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="post-style.css">
      <title>Post-detail</title>
   </head>
   <body>

      <?php include 'data.php';
            include 'functions.php';

            $post_slug = $_GET['slug'];
      ?>

      <?php

         $is_postFound = false;
         $posts_key = 0;

         do {
            if ( $post_slug == $posts[$posts_key]['slug'] ) {
               $is_postFound = true;
            }
            else {
               $posts_key++;
            }

         } while (!$is_postFound);



      ?>

         <div class="container">
            <h1 class="post-title"> <?php echo $posts[$posts_key]['title']; ?></h1>
            <h3 class="post-date"> <?php echo $posts[$posts_key]['published_at']; ?> </h3>
            <div class="post-content">
               <img class="post-image" src="<?php echo $posts[$posts_key]['image']; ?>" alt="image is not available">
               <p class="post-text"><?php echo $posts[$posts_key]['content']; ?></p>
            </div>
         </div>

   </body>

</html>
