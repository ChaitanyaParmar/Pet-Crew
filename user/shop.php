<?php
include_once("header.php");
?>

<style>
	/* Formatting search box */
	.search-box {
		width: 330px;
		position: relative;
		display: inline-block;
		font-size: 14px;
		margin-top: 0px;
		margin-right: 0px;
		position: relative;
		right: -40px;
		bottom: -65px;
		background: white;
	}

	.search-box input[type="text"] {
		height: 38px;
		padding: 5px 10px;
		border: 1px solid #CCCCCC;
		font-size: 15px;
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

	.our-team-text h4 {
		color: #222222;
		font-family: 'Open Sans', sans-serif;
		font-size: 30px;
		font-weight: bold;
		line-height: 5px;
		margin-top: 15px;
		text-align: center;
		padding-bottom: 18px;
	}
</style>

<form role="form" method="post">
	<section class="shop-section" style="padding-bottom: 0px;">
		<section class="slider_area" style="background-image:url(images/slider/4.jpg);">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="slider">
							<h2>SHOP</h2>
							<p> <a href="index.php">Home </a><span>/</span> <a href="shop.php">Shop</a></p>
						</div>
					</div>
				</div>
			</div>
		</section>


		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">

					<div class="search-box">
						<input type="text" autocomplete="off" placeholder="Search Shop..." />
						<div class="result"></div>
					</div>

					<div class="showing">
						<div class="single-form" style="text-align:center; margin-right:85px; margin-top:20px; ">
							<div class="select-input-wrapper">

								<?php

								if (isset($_SESSION["id"])) {
									$uid = $_SESSION["id"];
								} else {
									$uid = "";
								}

								$cnn = mysqli_connect("localhost", "root", "", "project");
								$query = "Select shop.shid,shop.lid,locations.lid,locations.lnm from locations,shop where locations.lid=shop.lid group by lnm order by lnm ASC";
								$result = $cnn->query($query);
								?>

								<select class="select-input" name="cmbarea" style='font-size:20px;text-transform:capitalize; background:white;'>
									<option style='font-size:14px; ' selected='selected'>--choose area--</option>

									<?php

									// selected='selected' 
									while ($row = $result->fetch_assoc()) {
										echo "<option style='font-size:15px;'  value=" . $row["lid"] . ">" . $row["lnm"] . "</option>";
									}

									?>
								</select>
							</div>

							<div style="text-align:center; margin-left: 280px; margin-top:-63px; ">
								<button type="submit" class="fa fa-search" style=" font-size:23px; background-color:white;" name="btnsub">
								</button>
							</div>
						</div>

					</div>
				</div>
			</div>
			<!-- <div class="row"> -->

			<?php

			$lid = "";
			if (isset($_POST["btnsub"])) {
				$lid = $_POST["cmbarea"];

				$yourURL = "shoparea.php?lid=$lid";
				echo ("<Script>location.href='$yourURL'</script>");
			}

			$cnn = mysqli_connect("localhost", "root", "", "project");
			$query = "SELECT * FROM `shop`";
			$result = $cnn->query($query);
			$str = "<table style='table-layout:fixed; '>";
			$x = 1;
			while ($row = $result->fetch_assoc()) {
				if ($x == 1) {
					$str .= "<tr class='row '>";
				}
				$x++;
				$str .= "<td class='col-lg-4 col-md-12 col-sm-3'>
                
        <div class='our-team wow fadeInUp animated' data-wow-delay='300ms' data-wow-duration='1500ms'style='visibility: visible; animation-duration: 1500ms; animation-delay: 300ms; animation-name: fadeInUp;'>
          <div class='img-holder' style=' padding:20px;'>
            <figure><a href='shopinfo.php?shid=" . $row["shid"] . "'><img src='../shop/images/shop/".$row["img"]."' height='300' width='500' style='border-radius:0px; box-shadow:0px 0px 6px 2px black;' alt='Images'></a></figure>
				<a aria-hidden='true' href='sprod.php?name=" . $row["shid"] . "'>
              <div class='overlay' style='bottom: 40;left: 40px;opacity: 1;position: absolute;right: 40px;text-align: center;font-size:25px; font-weight:bold;color:black;'>
                <div class='team-icon'>
                  View Products
                  </div>
									</a>
                </div>
              </div>
              <div class='our-team-text' >`
                <h4>" . $row["sname"] . "</h4>
              </div>
            </div></td>";
				if ($x == 4) {
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
					$.get("backend-searchs.php?", {
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
	include_once("footer.php");
	?>