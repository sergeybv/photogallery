<?php include "adminincludes/header.php";?>

<?php if(!$session->is_signed_in()){redirect("login.php");} ?>



<?php

$users = User::find_all();


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
                 <p class="bg-success">
                  <?php echo $message; ?>
                 </p>
                    <h1 class="page-header">
                        Users                        
                    </h1>

                    <a href="add_user.php" class="btn btn-primary">Add User</a>
                   
                        <div class="col-md-12">
                            
                              <table class="table table-hover">
                                  <thead>
                                      <tr>
                                          <th>Id</th>
                                          <th>Photo</th>
                                          <th>Username</th>
                                          <th>First Name</th>
                                          <th>Last Name</th>
                                      </tr>
                                  </thead>
                                  <tbody>

                                  <?php foreach ($users as $user) : ?>
                                    
                                 
                                      <tr>
                                          <td><?php echo $user->id; ?></td>
                                          <td><img class="admin-user-thumbnail user_image" src="<?php echo $user->image_path_and_placeholder(); ?>" alt=""></td>
                                          
                                          <td><?php echo $user->username; ?>
                                             <div class="action_links">
                                                 <a href="delete_user.php?id=<?php echo $user->id; ?>">Delete</a>
                                                 <a href="edit_user.php?id=<?php echo $user->id; ?>">Edit</a>
                                                 
                                               </div>
                                          </td> 
                                             
                                          <td><?php echo $user->first_name; ?></td>
                                          <td><?php echo $user->last_name; ?></td>                                         
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