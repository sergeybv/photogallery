<?php include "adminincludes/header.php";?>


<?php if(!$session->is_signed_in()){redirect("login.php");} ?>



<?php

$comments = Comment::find_all();


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
                       All comments                       
                    </h1>
                   
                        <div class="col-md-12">
                            
                              <table class="table table-hover">
                                  <thead>
                                      <tr>
                                          <th>Id</th>
                                          <th>Author</th>
                                          <th>Body</th>
                                         
                                      </tr>
                                  </thead>
                                  <tbody>

                                  <?php foreach ($comments as $comment) : ?>
                                    
                                 
                                      <tr>
                                          <td><?php echo $comment->id; ?></td>
                                          
                                          
                                          <td><?php echo $comment->author; ?>
                                             <div class="action_links">
                                                 <a href="delete_comment.php?id=<?php echo $comment->id; ?>">Delete</a>
                                                 
                                                 
                                               </div>
                                          </td> 
                                             
                                          <td><?php echo $comment->body; ?></td>
                                                                                
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