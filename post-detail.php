<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="post-style.css">
      <script type="text/javascript" src="jquery-3.3.1.min.js"></script>
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

            <button class="btn" type="button" name="button">Show comments</button>

            <div class="comments-cnt">

            </div>

         </div>




         <script type="text/javascript">


            $(document).ready(function(){
               var postSlug = '<?php echo $post_slug; ?>';

               console.log(postSlug);

               $(document).on('click', '.btn', function() {

                  $.ajax({
                     url : "comments.php",
                     method : "GET",
                     data : {
                        slug : postSlug,
                     },
                     success : function(data){

                        var commentsObj = JSON.parse(data);
                        console.log(commentsObj);

                        for (var i = 0; i < commentsObj.length; i++) {

                              $('.comments-cnt').append(

                                    '<h1 class="post-title">' + commentsObj[i]['name'] + '</h1>' +
                                    '<h3 class="post-date">' + commentsObj[i]['email'] + '</h3>' +
                                    '<p class="post-content">' + commentsObj[i]['body'] + '</p>'

                              );
                        }
                     },
                     error : function(e){
                        console.log(e);
                     },
                  });

                  // alert($(this).attr('href'));

               });



               function getFirst150(string) {
                  new_str = string.substr(0, 151);
                  new_str += ' ...';
                  return new_str;
               }
            });

         </script>



   </body>

</html>
