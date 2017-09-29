<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Shop | Hermo</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<?php
$connect = mysqli_connect("localhost", "root", "", "hermo");

?>

<body>
	
	
	
	<section>
		<br><br>
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Products </h2>
						 <?php 
											$query = "SELECT * FROM product ";
											$result = mysqli_query($connect, $query);
											if(mysqli_num_rows($result) > 0)
											{
											while($row = mysqli_fetch_array($result))
											{
												
									?>
									
	<div class="top-box" align="center" style="margin-left:1px">
		<div class="col-sm-4" >
			<a href="product-details.php?id=<?php echo $row["productid"];?>" method="post" name="detail">
				<div class="inner_content clearfix">
					<div class="product_image">
						<img src="<?php echo $row["image"]; ?>" name="image" width="250" height="280"/><br />
					
							<div class="price">
								<div class="cart-left">
								<h4 class="text-info"><?php echo $row["name"]; ?></h4>
									</a>
									<div class="price1">
									  <span class="actual" name="price">RM <?php echo $row["sell_price"]; ?></span><br>
									  <span class="actual" name="price"><s>RM <?php echo $row["retail_price"]; ?></s></span>
									</div>
								</div>
							</div>
					</div>
					
				<input type="number" name="quantity" class="form-control" value="1" style="text-align:center"/>
				<input type="hidden" name="name" method="post" value=" <?php echo $row ["name"];?>"/>
				<input type="hidden" name="price" value=" <?php echo $row ["price"]; ?>"/>
				<?php if(!isset($_SESSION['customer'])){
								echo "<a href='login.php' class='btn btn-default add-to-cart'>Add To Cart</a>";
								}
								else {
								?>
								<a class='btn btn-default add-to-cart' href="earring.php?add=<?php echo $row['productid'];?>">Add to Cart</a>
								<?php
									
								}
								?>
								

				</div>				
		</div>
	</div>
  </form>
						<?php
							}
							}
							?>
						
				<?php
if(isset($_GET['add'])){
	$id=$_SESSION['customer'];
	$productid= $_GET['add'];


$sql="INSERT INTO cart(productid,quantity,username)
VALUES
('$productid','1','$id')";

if (mysqli_query($connect, $sql))
  {
  echo "<script>alert('Successfully added!')</script>";
  }
  else {
	  echo "<script>alert('Failed to add')</script>";
  }
	
}
								?>
						
						
				
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>

	

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>