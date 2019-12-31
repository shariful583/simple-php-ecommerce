<?php


    function msg($message){
        echo $message;

    }
    function login()
    {

        if (isset($_POST['submit'])) {
            $form_id = $_POST['id'];

            $form_email = $_POST['email'];
            $form_pass = $_POST['password'];
            $query = query("SELECT * FROM user WHERE email = '$form_email' AND password = '$form_pass'");
            confirm($query);
            if (mysqli_num_rows($query) != 0) {
                $_SESSION['id'] = $form_id;
                redirectTo("admin");
            } else {
                redirectTo("login.php");
            }
        }
    }


    function logout(){
        session_destroy();
        redirectTo('login.php');
    }


    function auth(){
       if(isset($_SESSION['id'])) {
        redirectTo("login.php");
       } else {
           session_unset();
           redirectTo("admin");
       }
    }

   function redirectTo($location) {
       header("Location: $location");
   }

   function query($query) {
       global $conn;
       return mysqli_query($conn,$query );
   }

   function confirm($receive)
   {
       global $conn;
       if (!$receive) {
           die("Query Failed" . mysqli_error($conn));
       }
   }

   function escape_string($string) {
       global $conn;
       return mysqli_real_escape_string($conn,$string);
   }

   function fetch_array($query) {
     return  mysqli_fetch_array($query);
   }


//   Get Products


   function get_products() {
       $query = query("SELECT * FROM products");
       confirm($query);

       while($result = mysqli_fetch_array($query)) {
           $product = <<<DELIMETER
                      <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <a><img src="{$result['product_photo']}" alt=""></a>
                            <div class="caption">
                                <h4 class="pull-right">{$result['product_price']}</h4>
                                <h4><a href="item.php?id={$result['id']}">{$result['product_title']}</a>
                                </h4>
                                <p>{$result['product_des']}<a target="_blank" href="http://www.bootsnipp.com">See More</a>.</p>
                            </div>
                            <a class="btn btn-primary" href="cart.php?id={$result['id']}">Add To Cart</a>
                        </div>
                    </div>

DELIMETER;

           echo $product;

       }
   }




//   get categories from database

function get_categories()
{
    $query = query("SELECT * FROM categories");
    confirm($query);
    while ($result = fetch_array($query)) {
        $categories = <<<DELIMETER
           <a href="category.php?id={$result['id']}" class="list-group-item">{$result['categories']}</a>
DELIMETER;
        echo $categories;
    }
}

//categories in categories page



      function categories_in_categories_page()
      {
          $query = "SELECT * FROM products WHERE product_category_id =" . escape_string($_GET['id']) . " ";
          $result = query($query);
          confirm($result);
          while ($row = fetch_array($result)) {
              $products = <<<DELIMETER
            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="http://placehold.it/800x500" alt="">
                    <div class="caption">
                        <h3>{$row['product_title']}</h3>
                        <span>{$row['product_short']}</span>
                        <p>
                            <a href="cart.php?id={$row['id']}" class="btn btn-primary">Add to Cart</a> <a href="item.php?id={$row['id']}" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>
DELIMETER;
              echo $products;


          }
      }


//      shop


function shop()
{
    $query = "SELECT * FROM products";
    $result = query($query);
    confirm($result);
    while ($row = fetch_array($result)) {
        $products = <<<DELIMETER
            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="http://placehold.it/800x500" alt="">
                    <div class="caption">
                        <h3>{$row['product_title']}</h3>
                        <span>{$row['product_short']}</span>
                        <p>
                            <a href="item.php?id={$row['id']}" class="btn btn-primary">Buy Now!</a> <a href="item.php?id={$row['id']}" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>
DELIMETER;
        echo $products;


    }
}
























