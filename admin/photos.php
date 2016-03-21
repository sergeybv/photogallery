<?php include "adminincludes/header.php";?>

<?php if(!$session->is_signed_in()){redirect("login.php");} ?>



<?php

$photos = Photo::find_all();


?>

    <div id="wrapper">

    <!-- Navigation -->
<?php include "adminincludes/top_nav.php";?>

<?php include "adminincludes/sidebar_nav.php";?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Photos <small>Statistics Overview</small>
                    </h1>
                   
                        <div class="col-md-12">
                            
                              <table class="table table-hover">
                                  <thead>
                                      <tr>
                                          <th>Photo</th>
                                          <th>Id</th>
                                          <th>File name</th>
                                          <th>Title</th>
                                          <th>Size</th>
                                          <th>Comments</th>
                                      </tr>
                                  </thead>
                                  <tbody>

                                  <?php foreach ($photos as $photo) : ?>
                                    
                                 
                                      <tr>
                                          <td><img class="admin-photo-thumbnail" src="<?php echo $photo->picture_path(); ?>" alt="">

                                              <div class="action_links">
                                                 <a class="delete_link" href="delete_photo.php?id=<?php echo $photo->id; ?>">Delete</a>
                                                 <a href="edit_photo.php?id=<?php echo $photo->id; ?>">Edit</a>
                                                 <a href="../photo.php?id=<?php echo $photo->id; ?>">View</a>
                                               </div>

                                          </td>
                                          <td><?php echo $photo->id; ?></td>
                                          <td><?php echo $photo->filename; ?></td>
                                          <td><?php echo $photo->title; ?></td>
                                          <td><?php echo $photo->size; ?></td>                                         
                                          <td>

                                      <div class="action_links">
                                        <a href="comment_photo.php?id=<?php echo $photo->id; ?>"><?php 

                                          $comments = Comment::find_the_comments($photo->id);

                                          echo count($comments);

                                           ?>                                           
                                          </a>
                                      </div>

                                          </td>                                         
                                      </tr>

                                  <?php endforeach; ?>

                                  </tbody>

                              </table>

                        </div>

                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    
                </div>
            </div>
            <!-- /.row -->


        </div>
        <!-- /.container-fluid -->

<?php include "adminincludes/footer.php";?>