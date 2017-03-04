<!-- PHP -->
<?php

$page_id = (isset($_GET['id']) ? $_GET['id'] : null);
$sql1 = "SELECT * FROM post WHERE post_id='$page_id'";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();

//Format Date
$rawPostDate = $row1['post_date'];
$dates = explode(' ', $rawPostDate);
$dat = $dates[0];
$time = $dates[1];

$formatDate=explode("-",$dat);
$date=$formatDate[2];
$month=$formatDate[1];
$year=$formatDate[0];

$monthName = date("F", mktime(0, 0, 0, $month, 10));
$post_date = $monthName." ".$date.",".$year;

?>
<!-- End .PHP -->

<!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->

	<div id="fh5co-main">
		<div class="container">
			<div class="row">
				
				<div class="col-md-12">

						<h3><?php echo $row1["post_title"]; ?></h3>

						<p>Posted by <b><?php echo $row1["post_author"];?></b> on <b><?php echo $post_date; ?></b>

						<div id="share-buttons">
   
						    <!-- Facebook -->
						    <a href="http://www.facebook.com/sharer.php?u=http://overseaspicks.com/heydaddy?menu=blog&id=<?= $page_id; ?>" target="_blank">
						        <img src="img/share/facebook.png" alt="Facebook" />
						    </a>

						    <!-- Twitter -->
						    <a href="https://twitter.com/share?url=http://overseaspicks.com/heydaddy?menu=blog&id=<?= $page_id; ?>&amp;text=<?= $row1["post_title"]?>&amp;hashtags=heydaddy" target="_blank">
						        <img src="img/share/twitter.png" alt="Twitter" />
						    </a>

						    <!--Google Plus-->
						    <a href="https://plus.google.com/share?url=http://overseaspicks.com/heydaddy?menu=blog&id=<?= $page_id; ?>" target="_blank">
						        <img src="img/share/google.png" alt="Google" />
						    </a>

							<!-- Pinterest -->
						    <a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());">
						        <img src="img/share/pinterest.png" alt="Pinterest" />
						    </a>

						    <!-- Email -->
						    <a href="mailto:?Subject=Hey Daddy&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20 http://overseaspicks.com/heydaddy?menu=blog&id=<?= $page_id; ?>">
						        <img src="img/share/email.png" alt="Email" />
						    </a>

						    <!-- Print -->
						    <a href="javascript:;" onclick="window.print()">
						        <img src="img/share/print.png" alt="Print" />
						    </a>
						</div>

						<hr class="small">

						<div class="container-fluid no-padding">
						  <div class="row">
						    <div class="col-md-12">
						      <a href="img/post/<?php echo $row1["post_image"]?>" class="image-popup fh5co-board-img" title="<?php echo $row1["post_title"]?>">
						      	<img src="img/post/<?php echo $row1["post_image"];?>" alt="<?php echo $row1["post_title"]; ?>" class="img-responsive" />
						      </a>
						    </div>
						  </div>
						</div>
						
						<div class="fh5co-spacer fh5co-spacer-sm"></div>

						<?php echo $row1["post_content"];?>	

						<br /><br />

						<p>Tag: <span class="label label-<?php echo $row1["post_category"]?>"><?php echo $row1["post_category"]?></span> </p>

						<p class="text-right"><a href="index.php"> &larr; Back To Home </a></p>
				</div>	

        	</div>
        </div>
     </div>


	<hr class="small">
