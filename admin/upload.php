<?php include "adminincludes/header.php";?>

<?php if(!$session->is_signed_in()){redirect("login.php");} ?>


<?php 
    $message = "";
   if(isset($_FILES['file'])){

      $photo = new Photo();
      $photo->title = $_POST['title'];
      $photo->set_file($_FILES['file']);



  if($photo->save()){

       $message = "Photo uploaded successefully!";

  }else{

     $message = join("<br>", $photo->errors);

  }


   }




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
                        Upload <small>Statistics Overview</small>
                    </h1>
                   <div class="row">
                     <div class="col-md-6">
                     <?php echo $message; ?>
                      <form action="upload.php" method="post" enctype="multipart/form-data">
                          
                         <div class="form-group">
                             
                            <input type="text" name="title" class="form-control">

                         </div>

                         <div class="form-group">
                             
                            <input type="file" name="file">

                         </div>

                         <input type="submit" name="submit">
                      </form> 

                      </div>

                      </div>



            <div class="row">
                <div class="col-lg-12">

                 <form action="upload.php" class="dropzone"></form>
                   
                </div>
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