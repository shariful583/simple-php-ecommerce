<?php require_once("../resources/config.php"); ?>

<?php


  if(isset($_GET['id'])) {
      $quary = query("SELECT * FROM products WHERE id = " . escape_string($_GET['id']) . " ");
      confirm($quary);
      $row = fetch_array($quary);
      if ($row['product_qty'] != $_SESSION['product_' . $_GET['id']]) {
          $_SESSION['product_' . $_GET['id']]++;
          redirectTo('checkout.php');
      } else {
          msg('Product Stock Out');
          redirectTo('checkout.php');
      }
  }

  if(isset($_GET['remove'])) {
      $_SESSION['product_' . $_GET['remove']]--;
      if($_SESSION['product_' . $_GET['remove']] < 1) {
          $_SESSION['product_' . $_GET['remove']] = 0;
          redirectTo('checkout.php');
      } else {
          redirectTo('checkout.php');
      }
  }



  if(isset($_GET['delete'])) {
      $_SESSION['product_' . $_GET['delete']] ='0';
      redirectTo('checkout.php');
  }



  function cart() {
      $GLOBALS['total_price'] = 0;
      $GLOBALS['total_item'] = 0;
      foreach ($_SESSION as $name => $value) {
          $GLOBALS['value'] = $value;
          if($value>0) {
              if(substr($name, 0, 8) == 'product_') {
                  $len = strlen($name);
                  $id = substr($name, 8, $len);
                  $query = query("SELECT * FROM products WHERE id = '$id'");
                  confirm($query);
                  while($row = fetch_array($query)) {
                      $GLOBALS['sub_total'] = $row['product_price'] * $value;
                      $product = <<<DELIMETER
           <tr>
                <td>{$row['product_title']}</td>
                <td>BDT{$row['product_price']}</td>
                <td>{$GLOBALS['value']}</td>
                <td>{$GLOBALS['sub_total']}</td>
                <td><a href = "cart.php?id={$id}" type="button" class="btn btn-info"><span class="glyphicon glyphicon-plus-sign"></span></a>
                    <a href = "cart.php?remove={$id}" type="button" class="btn btn-warning"><span class="glyphicon glyphicon-minus-sign"></span></a>
                    <a href = "cart.php?delete={$id}" type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle"></span></a>
                </td>
              
            </tr>
DELIMETER;
                      echo $product;

                  }
                  $GLOBALS['total_price'] = $GLOBALS['total_price'] + $GLOBALS['sub_total'];
                  $GLOBALS['total_item'] = $GLOBALS['total_item'] + $GLOBALS['value'];

              }
          }

      }
  }





?>
