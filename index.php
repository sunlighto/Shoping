<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_GET['action']) && $_GET['action']=="add"){
	$id=intval($_GET['id']);
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
	}else{
		$sql_p="SELECT * FROM products WHERE id={$id}";
		$query_p=mysqli_query($con,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);
		
		}else{
			$message="Product ID is invalid";
		}
	}
		echo "<script>alert('Product has been added to the cart')</script>";
		echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">

	    <title>My shop Home Page</title>
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    <link rel="stylesheet" href="assets/css/main.css">
	    <link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
		<link rel="stylesheet" href="assets/css/config.css">
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@500&family=Lemonada:wght@500&family=Rubik:ital@1&display=swap" rel="stylesheet">

		<link rel="shortcut icon" href="assets/images/favicon.ico">

	</head>
    <body class="cnt-home">
<header class="header-style-1">
<?php include('includes/top-header.php');?>
<?php include('includes/main-header.php');?>
<?php include('includes/menu-bar.php');?>
</header>
<section>
<div class="body-content outer-top-xs" id="top-banner-and-menu">
	<div class="container">
		<div class="furniture-container homepage-container">
		<div class="row">
		
			<div class="col-xs-12 col-sm-12 col-md-3 sidebar">
	
	<?php include('includes/side-menu.php');?>

			</div>
			
			<div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
			
			
<div id="hero" class="homepage-slider3">
	<div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
		<div class="full-width-slider">	
			<div class="item" style="background-image: url(assets/images/sliders/5_231020_830_299_4_.png);">
				
			</div>
		</div>
	    
	    <div class="full-width-slider">
			<div class="item full-width-slider" style="background-image: url(assets/images/sliders/830_x_299_24112020-20.png);">
			</div>
		</div>

		<div class="full-width-slider">
			<div class="item full-width-slider" style="background-image: url(assets/images/sliders/car2.png);">
			</div>
		</div>
	</div>
</div>	
			</div>	
		</div>
		<div id="product-tabs-slider" class="scroll-tabs inner-bottom-vs  wow fadeInUp">
			<div class="more-info-tab clearfix">
			   <h3 class="new-product-title pull-left">You may be interested</h3>
				<ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
					<li class="active"><a href="#all" data-toggle="tab">All</a></li>
					<li><a href="#history" data-toggle="tab">History</a></li>
					<li><a href="#self-development" data-toggle="tab">Self-development</a></li>
					<li><a href="#fiction" data-toggle="tab">Fiction</a></li>
					<li><a href="#childrens_literature" data-toggle="tab">Childrens literature</a></li>
				</ul>
			</div>
			<div class="tab-content outer-top-xs">
				<div class="tab-pane in active" id="all">			
					<div class="product-slider">
						<div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
<?php
$ret=mysqli_query($con,"select * from products");
while ($row=mysqli_fetch_array($ret)) 
{
?>					    	
		<div class="item item-carousel">
			<div class="products">			
	<div class="product">		
		<div class="product-image">
			<div class="image">
				<a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">
				<img class="img_product" src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>"alt=""></a>
			</div>		                        		   
		</div>
		<div class="product-info text-left">
			<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['productName']);?></a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>

					<div class="product-price">	
				<span class="price">
				UAH <?php echo htmlentities($row['productPrice']);?>			</span>
										     <span class="price-before-discount">UAH <?php echo htmlentities($row['productPriceBeforeDiscount']);?>	</span>
							
			</div>
			
		</div>
		<?php if($row['productAvailability']=='In Stock'){?>
					<div class="action"><a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary">В корзину</a></div>
				<?php } else {?>
						<div class="action" style="color:red">Not available</div>
					<?php } ?>
			</div>
			</div>
		</div>
	<?php } ?>
			</div>
					</div>
				</div>
				<div class="tab-pane" id="childrens_literature">
					<div class="product-slider">
						<div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
		<?php
$ret=mysqli_query($con,"select * from products where category=4");
while ($row=mysqli_fetch_array($ret)) 
{
?>				    	
		<div class="item item-carousel">
			<div class="products">
				
	<div class="product">		
		<div class="product-image">
			<div class="image">
				<a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">
				<img  src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>"  width="180" height="300" alt=""></a>
			</div>					                   		   
		</div>	
		<div class="product-info text-left">
			<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['productName']);?></a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>

			<div class="product-price">	
				<span class="price">
				UAH  <?php echo htmlentities($row['productPrice']);?>			</span>
										     <span class="price-before-discount">UAH <?php echo htmlentities($row['productPriceBeforeDiscount']);?></span>						
			</div>		
		</div>
				<?php if($row['productAvailability']=='In Stock'){?>
					<div class="action"><a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary">В корзину</a></div>
				<?php } else {?>
						<div class="action" style="color:red">Немає в наявності</div>
					<?php } ?>
			</div>
			</div>
		</div>
	<?php } ?>	
								</div>
					</div>
				</div>
				<div class="tab-pane" id="self-development">
					<div class="product-slider">
						<div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
		<?php
$ret=mysqli_query($con,"select * from products where category=2");
while ($row=mysqli_fetch_array($ret)) 
{
?>				    	
		<div class="item item-carousel">
			<div class="products">
				
	<div class="product">		
		<div class="product-image">
			<div class="image">
				<a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">
				<img  src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>"  width="180" height="300" alt=""></a>
			</div>					                   		   
		</div>	
		<div class="product-info text-left">
			<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['productName']);?></a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>

			<div class="product-price">	
				<span class="price">
				UAH  <?php echo htmlentities($row['productPrice']);?>			</span>
										     <span class="price-before-discount">UAH <?php echo htmlentities($row['productPriceBeforeDiscount']);?></span>						
			</div>		
		</div>
				<?php if($row['productAvailability']=='In Stock'){?>
					<div class="action"><a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary">В корзину</a></div>
				<?php } else {?>
						<div class="action" style="color:red">Немає в наявності</div>
					<?php } ?>
			</div>
			</div>
		</div>
	<?php } ?>	
								</div>
					</div>
				</div>
	<div class="tab-pane" id="history">
					<div class="product-slider">
						<div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
		<?php
$ret=mysqli_query($con,"select * from products where category=1");
while ($row=mysqli_fetch_array($ret)) 
{
?>				    	
		<div class="item item-carousel">
			<div class="products">
				
	<div class="product">		
		<div class="product-image">
			<div class="image">
				<a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">
				<img  src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>"  width="180" height="300" alt=""></a>
			</div>					                   		   
		</div>	
		<div class="product-info text-left">
			<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['productName']);?></a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>

			<div class="product-price">	
				<span class="price">
				UAH  <?php echo htmlentities($row['productPrice']);?>			</span>
										     <span class="price-before-discount">UAH <?php echo htmlentities($row['productPriceBeforeDiscount']);?></span>						
			</div>		
		</div>
				<?php if($row['productAvailability']=='In Stock'){?>
					<div class="action"><a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary">В корзину</a></div>
				<?php } else {?>
						<div class="action" style="color:red">Немає в наявності</div>
					<?php } ?>
			</div>
			</div>
		</div>
	<?php } ?>	
								</div>
					</div>
				</div>
		<div class="tab-pane" id="fiction">
					<div class="product-slider">
						<div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
		<?php
$ret=mysqli_query($con,"select * from products where category=3");
while ($row=mysqli_fetch_array($ret)) 
{
?>			    	
		<div class="item item-carousel">
			<div class="products">
				
	<div class="product">		
		<div class="product-image">
			<div class="image">
				<a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">
				<img  src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>"  width="180" height="300" alt=""></a>
			</div>		
			                        		   
		</div>
			
		<div class="product-info text-left">
			<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['productName']);?></a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>

			<div class="product-price">	
				<span class="price">
				UAH <?php echo htmlentities($row['productPrice']);?>			</span>
										     <span class="price-before-discount">UAH <?php echo htmlentities($row['productPriceBeforeDiscount']);?></span>					
			</div>			
		</div>
				<?php if($row['productAvailability']=='In Stock'){?>
					<div class="action"><a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-primary">В корзину</a></div>
				<?php } else {?>
						<div class="action" style="color:red">Немає в наявності</div>
					<?php } ?>
			</div>
			</div>
		</div>
	<?php } ?>
								</div>
					</div>
				</div>
			</div>
		</div>

	
		</section>
</div>
</div>
<?php include('includes/footer.php');?>
	
	<script src="assets/js/jquery-1.11.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
	<script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
	<script src="assets/js/scripts.js"></script>
</body>
</html>