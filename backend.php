<?php
   include 'data.php';

   $value = $_GET['tag'];
   $state = $_GET['state'];


   //$value = 'all';
   $new_data = [];


   if ($state == 'unpressed') {

      foreach ($posts as $post) {

         if (in_array($value, $post['tag'])) {

               $data = [
                  'title' => $post['title'],
                  'content' => $post['content'],
                  'image' => $post['image'],
                  'tag' => [$value],
                  'slug' => $post['slug'],
                  'published_at' => $post['published_at']
               ];

               $new_data[] = $data;

         }





      }
   }   elseif ($state == 'pressed') {
      $new_data = $posts;
   }



   $new_data = json_encode($new_data);

   echo $new_data;

?>
