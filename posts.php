<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="style.css">
      <script type="text/javascript" src="jquery-3.3.1.min.js"></script>
      <title>BoolPress</title>
   </head>
   <body>

      <?php include 'data.php';
            include 'functions.php';
      ?>

      <?php foreach ($posts as $post) { ?>
               <div class="container">
                  <h1 class="post-title"><a href="#"> <?php echo $post['title'];?> </a></h1>
                  <h3 class="post-date">pubblicato il <?php echo $post['published_at'];?></h3>
                  <p class="post-content"><?php echo getFirst150($post['content']); ?></p>
               </div>
      <?php } ?>




      <script type="text/javascript">


         $(document).ready(function(){

         });

      </script>

      <script type="text/javascript" src="main.js"></script>
   </body>
</html>
