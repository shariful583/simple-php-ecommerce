<?php require_once("../../resources/config.php"); ?>
<?php include(TEMPLATE_BACK . DS ."header.php"); ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="col-lg-12">
            <h1 class="page-header">
                Users
            </h1>
              <p class="bg-success">

            </p>
            <a href="add_user.php" class="btn btn-primary">Add User</a>
            <div class="col-md-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Photo</th>
                            <th>Username</th>
                            <th>First Name</th>
                            <th>Last Name </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2</td>
                            <td><img class="admin-user-thumbnail user_image" src="placehold.it/62x62" alt=""></td>
                            <td>Rico
                                  <div class="action_links">

                                    <a href="">Delete</a>
                                    <a href="">Edit</a>
                                </div>
                            </td>
                            <td>Edwin</td>
                           <td>Diaz</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<?php include(TEMPLATE_BACK . DS ."footer.php"); ?>