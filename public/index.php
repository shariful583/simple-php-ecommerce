<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS ."header.php"); ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

<!--  Left Sidebar-->
            <?php include(TEMPLATE_FRONT . DS ."left_sidebar.php"); ?>

            <div class="col-md-9">

                <div class="row carousel-holder">

<!--  slider-->
                    <?php include(TEMPLATE_FRONT . DS ."slider.php"); ?>

                </div>

                <div class="row">

                    <?php get_products(); ?>


                </div>

            </div>

        </div>

    </div>

<?php include(TEMPLATE_FRONT . DS ."footer.php"); ?>