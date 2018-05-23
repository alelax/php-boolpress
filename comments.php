<?php
   include 'data-comments.php';

   $slug_value = $_GET['slug'];



   //$value = 'all';
   $new_data_comments = [];

   foreach ($comments as $comment_key => $comment) {

      if ($comment_key == $slug_value) {
         
         foreach ($comment as $comment_value) {

            $data = [
               'id' => $comment_value['id'],
               'name' => $comment_value['name'],
               'email' => $comment_value['email'],
               'body' => $comment_value['body'],
            ];

            $new_data_comments[] = $data;
         }



      }

   }



   $new_data_comments = json_encode($new_data_comments);

   echo $new_data_comments;

?>
