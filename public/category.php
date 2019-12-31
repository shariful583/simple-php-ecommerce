<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS ."header.php"); ?>


    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header>

        </header>

        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Product</h3>
            </div>
        </div>

        <!-- Page Features -->
        <div class="row text-center">
            <?php
            categories_in_categories_page();


            ?>

        </div>


        <hr>

        <!-- Footer -->
<?php include(TEMPLATE_FRONT . DS ."footer.php"); ?>