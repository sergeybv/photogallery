<?php include "adminincludes/header.php";?>


<?php if(!$session->is_signed_in()){redirect("login.php");} ?>

    <div id="wrapper">

        <!-- Navigation -->
        
        <?php include "adminincludes/top_nav.php";?>

        <?php include "adminincludes/sidebar_nav.php";?>

        <div id="page-wrapper">

            <div class="container-fluid">


                <?php include "adminincludes/admin_content.php";?>

            <!-- /.container-fluid -->
            
              
<?php include "adminincludes/footer.php";?>