<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="home.css">
      <script type="text/javascript" src="jquery-3.3.1.min.js"></script>
      <title>BoolPress</title>
   </head>
   <body>

      <?php include 'data.php';
            include 'functions.php';

            $this_page = 'posts.php?tag=';
            $post_page = 'post-detail.php?slug=';
      ?>

      <?php foreach ($posts as $post) { ?>
               <div class="container">
                  <h1 class="post-title"><a href="<?php echo $post_page . $post['slug']; ?>"> <?php echo $post['title'];?> </a></h1>
                  <h3 class="post-date">pubblicato il <?php echo $post['published_at'];?></h3>

                  <div class="tag-cnt">
                     <?php foreach ($post as $tags => $tag) {
                        if ($tags == 'tag') {
                           foreach ($tag as $tag_value) { ?>
                              <button class="tag" state="unpressed" tagval="<?php echo /*'tag=' .*/ $tag_value; ?>"> <?php echo $tag_value; ?> </button>
                           <?php    }
                        }
                     } ?>
                  </div>

                  <p class="post-content"><?php echo getFirst150($post['content']); ?></p>
               </div>
      <?php } ?>




      <script type="text/javascript">


         $(document).ready(function(){

            $(document).on('click', '.tag', function() {

               var tag_clicked = $(this).attr('tagval');
               var tag_state = $(this).attr('state');
               // console.log(tag_clicked);

               $.ajax({
                  url : "backend.php",
                  method : "GET",
                  data : {
                     tag : tag_clicked,
                     state : tag_state
                  },
                  success : function(data){

                     var obj = JSON.parse(data);
                     console.log(obj);


                     console.log('---------');
                     console.log(tag_state);
                     var next_state = '';

                     if (tag_state == 'unpressed') {
                        next_state = 'pressed';
                     } else {
                        next_state = 'unpressed';
                     }

                     $('body').html('');

                     for (var i = 0; i < obj.length; i++) {
                           console.log(obj.length);
                           //console.log(obj[0]);
                           $('body').append(
                              '<div class="container">' +
                                 '<h1 class="post-title"><a href="<?php echo $post_page; ?>' + obj[i]['slug'] + '">' + obj[i]['title'] + ' </a></h1>' +
                                 '<h3 class="post-date">pubblicato il ' + obj[i]['published_at'] + '</h3>' +
                                 '<div id="'+ i +'" class="tag-cnt">' +
                                 '</div>' +
                                 '<p class="post-content">' + getFirst150(obj[i]['content']) + '</p>' +
                              '</div>'
                           );

                           for (var j = 0; j < obj[i]['tag'].length; j++) {
                              $('#'+i).append(
                                '<button class="tag" state="'+ next_state +'" tagval="' + obj[i]['tag'][j] + '">' + obj[i]['tag'][j] + ' </button>'
                              );
                           }

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

      <script type="text/javascript" src="main.js"></script>
   </body>
</html>
