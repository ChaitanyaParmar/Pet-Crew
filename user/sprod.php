<?php
include_once('header.php');
?>

<style>
	/* Formatting search box */
	.search-box {
		width: 350px;
		position: relative;
		display: inline-block;
		font-size: 14px;
		margin-bottom: 30px;
		margin-left: 20px;

	}

	.search-box input[type="text"] {
		height: 32px;
		padding: 5px 10px;
		border: 1px solid #CCCCCC;
		font-size: 14px;
	}

	.result {
		position: absolute;
		z-index: 999;
		top: 100%;
		left: 0;
	}

	.search-box input[type="text"],
	.result {
		width: 100%;
		box-sizing: border-box;

	}

	/* Formatting result items */
	.result p {
		margin: 0;
		padding: 7px 10px;
		border: 1px solid #CCCCCC;
		border-top: none;
		cursor: pointer;
		background: white;

	}

	.result p:hover {
		background: #f2f2f2;
	}

	li {
		color: #009ed4;
	}
</style>
<section class="slider_area" style="background-image:url(images/slider/4.jpg);">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="slider">
					<h2>SHOP</h2>
					<p> <a href="index.php">Home </a><span>/</span> <a href="shop.php">Shop</a><span>/</span><a> Products</a></p>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="shop-section" style="padding-top: 30px;padding-bottom: 60px;">
	<div class="container">
		<?php
		if (isset($_SESSION["id"])) {
			$uid = $_SESSION["id"];
		} else {
			$uid = "";
		}
    $name = $_REQUEST["name"];
		$cnn = mysqli_connect("localhost", "root", "", "project");
		$query = "Select pid,pname,aprice,oprice,pvalue,product.img,product.rate from product where product.shid='$name'";
		$result = $cnn->query($query);
		$str = "<table style='table-layout:fixed; '>";
		$x = 1;
		while ($row = $result->fetch_assoc()) {

			$ans = $row["rate"];
			if ($x == 1) {
				$str .= "<tr class='row'>";
			}
			$x++;

			$str .= "<td class='col-lg-2 col-md-10 col-sm-3'><div class='shop-item' ><a href='productdetails.php?name=" . $row["pid"] . "&shid=".$name."'><div class='item_shop' style='border-radius:50%; '><img src='../shop/images/products/".$row["img"]."' width='200px' height='200px'></div></a>";
      
			if ($ans == 0) {
				$str .= "<li><i class='fa fa-star-o' aria-hidden='true' style='color:orange;'></i>
            <i class='fa fa-star-o' aria-hidden='true' style='color:orange;'></i>
            <i class='fa fa-star-o' aria-hidden='true' style='color:orange;'></i>
            <i class='fa fa-star-o' aria-hidden='true' style='color:orange;'></i>
            <i class='fa fa-star-o' aria-hidden='true' style='color:orange;'></i>
            </li>";
			}

			if ($ans == 1) {
				$str .= "<li>
            <i class='fa fa-star' aria-hidden='true' style='color:orange;'></i>
            <i class='fa fa-star-o' aria-hidden='true' style='color:orange;'></i>
            <i class='fa fa-star-o' aria-hidden='true' style='color:orange;'></i>
            <i class='fa fa-star-o' aria-hidden='true' style='color:orange;'></i>
            <i class='fa fa-star-o' aria-hidden='true' style='color:orange;'></i></li>";
			}

			if ($ans == 2) {
				$str .= "<li>
            <i class='fa fa-star' aria-hidden='true' style='color:orange;'></i>
            <i class='fa fa-star' aria-hidden='true' style='color:orange;'></i>
            <i class='fa fa-star-o' aria-hidden='true' style='color:orange;'></i>
            <i class='fa fa-star-o' aria-hidden='true' style='color:orange;'></i>
            <i class='fa fa-star-o' aria-hidden='true' style='color:orange;'></i></li>";
			}
			if ($ans == 3) {
				$str .= "<li><i class='fa fa-star' aria-hidden='true' style='color:orange;'></i>
            <i class='fa fa-star' aria-hidden='true' style='color:orange;'></i>
            <i class='fa fa-star' aria-hidden='true' style='color:orange;'></i>
            <i class='fa fa-star-o' aria-hidden='true' style='color:orange;'></i>
            <i class='fa fa-star-o' aria-hidden='true' style='color:orange;'></i>
            </li>";
			}

			if ($ans == 4) {
				$str .= "<li><i class='fa fa-star' aria-hidden='true' style='color:orange;'></i>
            <i class='fa fa-star' aria-hidden='true' style='color:orange;'></i>
            <i class='fa fa-star' aria-hidden='true' style='color:orange;'></i>
            <i class='fa fa-star' aria-hidden='true' style='color:orange;'></i>
            <i class='fa fa-star-o' aria-hidden='true' style='color:orange;'></i>
            </li>";
			}

			if ($ans == 5) {
				$str .= "<li><i class='fa fa-star' aria-hidden='true' style='color:orange;'></i>
            <i class='fa fa-star' aria-hidden='true' style='color:orange;'></i>
            <i class='fa fa-star' aria-hidden='true' style='color:orange;'></i>
            <i class='fa fa-star' aria-hidden='true' style='color:orange;'></i>
            <i class='fa fa-star' aria-hidden='true' style='color:orange;'></i>
            </li>";
			}

			$str .= "<b>" . $row["pname"] . "</b><br>" . "₹ " . $row["oprice"] ."&nbsp; <strike><font style='color:grey;'> ". "₹ " . $row["aprice"]."</strike></font>" . "
        </div>
        </div>
    
        </div></td>";
			if ($x == 5) {
				$str .= "</tr>";
				$x = 1;
			}
		}
		$str .= "</table>";
		echo $str;
		?>
	</div>
	</div>
</section>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
	$(document).ready(function() {
		$('.search-box input[type="text"]').on("keyup input", function() {
			/* Get input value on change */
			var inputVal = $(this).val();
			var resultDropdown = $(this).siblings(".result");
			if (inputVal.length) {
				$.get("backend-searchd.php?", {
					term: inputVal
				}).done(function(data) {
					// Display the returned data in browser
					resultDropdown.html(data);
				});
			} else {
				resultDropdown.empty();
			}
		});

		// Set search input value on click of result item
		$(document).on("click", ".result p", function() {
			$(this).parents(".search-box").find('input[type="text"]').val($(this).text());
			$(this).parent(".result").empty();
		});
	});
</script>

<?php
include_once('footer.php');
?>