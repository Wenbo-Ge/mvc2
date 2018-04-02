<?php
require_once('wenboShop-database.php');



?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>SHOP</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style type="text/css">
    	.card-text{
    		text-align: right;
    		color:blue;
    		font-weight: bold;
    	}
    	.card-title{
    		font-weight: bold;
    	}
    	button{
    		float: right;
    	}

    </style>
  </head>
  <body>
    <h1 style="color: blue;text-align: center">Welcome to Wenbo's Shop</h1>

<div class="container">
  <div class="row">
<?php
  $db=new DBConnection();
  $result=$db->getAllItemsReturnObj();
    foreach ($result as $value) {
?>
        <div class="col-sm">
            <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="<?php echo $value->getImgUrl(); ?>" alt="Card image cap">
            <div class="card-body">
              <p class="card-title"><?php
                  echo $value->getName();
                  ?></p>
              <p class="card-text"><?php
                  echo $value->getPrice();
                  ?></p>
              <p class=quantity></p>
              <button class="btn btn-success">Purchase</button>
            </div>
        </div>
        </div>
<?php
}
?>
  </div>
</div>

<div style="background-color: #ddd; position:fixed; right: 2rem; bottom: 2rem; padding: 1rem 2.5rem; border-radius: 1rem">
          Total: <span class="TotalPrice">0</span>
        </div>

<script type="text/javascript">
  $(document).ready(function(){
      $('button.btn btn-success').click(function(){
        var quantity = $('p.quantity').val();
        quantity.val(parseInt(quantity.val())+1);
        setTotal();
      });  

    function setTotal(){
    var initial=$('span.TotalPrice').val();
    initial += parseInt($('p.quantity').val())*parseFloat($('p.card-text').text());
    $('span.TotalPrice').html(initial.toFixed(2));
  }

  setTotal();

  });

  


</script>
	




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>