<?php
require_once('iShop-database.php');
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <title>iShop</title>
  </head>
  <body>



    <h1>Wenbo's iShop</h1>

  <div class="container">
      <div class="row">
<?php
  // 使用类
  $db=new DBConnection();
  // 使用类里的方法
  $result=$db->getAllItemsReturnObj();
   foreach ($result as $value) {
?>

        <div class="col-sm">
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="<?php echo $value->getImgUrl(); ?>" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title"><?php echo $value->getName(); ?></h5>
            <p class="card-text"><?php echo $value->getPrice(); ?></p>
            <button class="btn btn-primary purchase" data-price='<?php echo $value->getPrice(); ?>' onclick="add('<?php echo $value->getPrice(); ?>')">Purchase</button>
          </div>
          </div>
        </div>
<?php   
  }
?>
      </div>
    </div>

    <div style="background-color: #ddd; position:fixed; right: 2rem; bottom: 3rem; padding: 1rem 2.5rem; border-radius: 1rem">
          Total: <span class="TotalPrice">0</span>
    </div>

    <button class="btn btn-primary submit" style="position:fixed; right: 2rem; bottom: 0.5rem; border-radius: 1rem" onclick="submitTotal()">Submit</button>

<!-- 添加js动动态 -->
<script type="text/javascript">
  $(document).ready(function(){
      $('.purchase').click(function(){
          var price= $(this).data('price');
          var current_price=$('.TotalPrice').text();
          $('.TotalPrice').text((parseFloat(current_price)+parseFloat(price)).toFixed(2));
      });
  });
      

      // function add(price){
      //   console.log(price);
      //   var current_price=$('.TotalPrice').text();
      //   $('.TotalPrice').text((parseFloat(current_price)+parseFloat(price)).toFixed(2));
      // }
      
    function submitTotal(){
      var submit = $('.TotalPrice').text();
      console.log(submit);
      $.ajax({
        url:'ajax.php',
        type:'POST',
        data:{submitInfo:submit},
        dataType:'json',
        success: function (data){
          alert(data.res);
        }
      })
    }
  
</script>


    
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>