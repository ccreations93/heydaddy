	<!-- Main Content -->

	<div id="fh5co-main">
		<div class="container">

			<div class="row">

	        	<div id="fh5co-board" data-columns>

	        		<?php
	        			$sql = "SELECT * FROM post WHERE post_category='events' ORDER BY post_date DESC";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) {
	        		?>

		        	<div class="item">
		        		<div class="animate-box">
			        		<a href="img/post/<?php echo $row["post_image"]?>" class="image-popup fh5co-board-img" title="<?php echo $row["post_title"]?>"><img src="img/post/<?php echo $row["post_image"]?>" alt="<?php echo $row["post_title"]?>"></a>
		        		</div>
		        		<div class="fh5co-desc">
		        			<span class="label label-<?php echo $row["post_category"]?>"><?php echo $row["post_category"]?></span> <br />
		        			<h3> <a href="index.php?menu=blog&id=<?php echo $row["post_id"]?>"> <?php echo $row["post_title"]?> </a></h3> 
		        			<?php echo $row["post_description"]?>
		        		</div>
		        	</div>

		        	<?php } } ?>

	        	</div>

        	</div>

        	<hr class="small">
       </div>
	</div>
	<!-- END .Main Content -->