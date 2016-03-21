
<?php include_once "includes/header.php";?>
<?php include_once "includes/navigation.php";?>

<?php
 
  include_once "admin/adminincludes/init.php";

  

  if(empty($_GET['id'])){

    redirect("index.php");

  }

    $photo = Photo::find_by_id($_GET['id']);

    if(isset($_POST['submit'])){

       $author = htmlspecialchars(trim($_POST['author']));
       $body = htmlspecialchars(trim($_POST['body']));

       $new_comment = Comment::create_comment($photo->id, $author, $body);
       if($new_comment && $new_comment->save()){
       
            redirect("photo.php?id={$photo->id}");

       }else{

        $message = "There is a big problem with message";
       }

    }else{

      $author = "";
      $body = "";
    }

   $comments = Comment::find_the_comments($photo->id);


?>




     <!-- Page Content -->
    <div class="container">

        <div class="row">
                   
                   <!-- Blog post column --> 
                   <div class="col-lg-8">
                       

                       <h1><?php echo $photo->title; ?></h1>

                       <!-- Author -->
                       <p class="lead">
                           by <a href="#">Bootstrap</a>
                       </p>

                       <hr>

                       <p><span class="glyphicon glyphicon-time"> Posted on 17 feb 2016</span></p>

                       <hr>
                       
                       <!-- Preview image -->
                       <img class="img-responsive" src="admin/<?php echo $photo->picture_path(); ?>" alt="">

                       <hr>

                       <p class="lead"><?php echo $photo->caption; ?></p>
                       <p><?php echo $photo->description; ?></p>
                      

                       <hr>


                       <div class="well">
                           <h4>Leave a comment: </h4>
                           <form role="form" method="post">
                               <div class="form-group">
                               <label for="author">Author</label>
                                   <input type="text" name="author" class="form-control">                            
                               </div>
                               <div class="form-group">
                                   <textarea name="body" class="form-control" rows="3"></textarea>                                 
                               </div>
                               <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                           </form>

                       </div>

                       <hr>
                       
                       <?php foreach($comments as $comment):?>
                        <!-- Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-headind"><?php echo $comment->author; ?>
                                    <small></small>                                 
                                </h4>
                                 <?php echo $comment->body; ?>
                            </div>

                        </div>

                       <?php endforeach; ?>


                   </div><!-- Blog post column --> 


            <?php include_once "includes/sidebar.php";?>
            </div>
        <!-- /.row -->

   <?php include_once "includes/footer.php";?>