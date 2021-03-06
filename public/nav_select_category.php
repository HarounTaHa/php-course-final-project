<?php
include('../database/databaseConnection.php');
include('../templates/index_base.php');    

?>
<section class="inner-page-sec-padding-bottom space-db--30">
	<div class="container bg-light">
		<div class="row space-db-lg--60 space-db--30">
			<?php

			$id_category=mysqli_real_escape_string($connection,$_GET['id']);
			$query = "SELECT id,author_id,publish_house_id,category_id,name_book,release_year,release_number from books where category_id=$id_category";
			$result = mysqli_query($connection,$query);  
			echo $connection->error;
			if(mysqli_num_rows($result)>0){
				while ($row = mysqli_fetch_assoc($result)){
		   // -------------------------------------------------
					$author_id=$row['author_id'];
					$publish_house_id=$row['publish_house_id'];
					$category_id=$row['category_id'];
             // -------------------------------------------
					$query_author = "SELECT authorName from authors where id= $author_id";
					$result_author = mysqli_query($connection,$query_author);
					if(mysqli_num_rows($result_author)>0){
						$row_author= mysqli_fetch_assoc($result_author);
					}

					$query_category = "SELECT category_name from categorys where id = $category_id";
					$result_category=mysqli_query($connection,$query_category);
					if(mysqli_num_rows($result_category)>0){
                // $row_category= mysqli_fetch_assoc($result_category);
                // echo  '<td>'.$row_category['category_name'].'</td>';
					}

					$query_publish_house= "SELECT name_publish_house from publish_houses where id= $publish_house_id";
					$result_publish_house = mysqli_query($connection,$query_publish_house);
					if(mysqli_num_rows($result_publish_house)>0){
						$row_publish_house= mysqli_fetch_assoc($result_publish_house);
                // echo  '<td>'.$row_publish_house['name_publish_house'].'</td>';
					}

					?>


					<div id="myCard" class="col-lg-4 col-md-6 mb-lg--60 mb--30">
						<div class="blog-card card-style-grid">

							<a href="details_book.php?id=<?php echo$row['id'];?>" class="image d-block">
								<img src="../templates/static/image/others/book_photo.jpg" alt="">
							</a>
							<div >
								<h3 class="title"><a href="blog-details.html"></a><?php echo$row['name_book']?></h3>
								<p class="post-meta"><span><?php echo $row['release_year']?></span> | <a href="#"><?php echo $row_author['authorName']?></a>
									| <a href="#"><?php echo $row_publish_house['name_publish_house']?></a>
								</p>
								<article>
									<h2 class="sr-only">
										Blog Article
									</h2>
									<p>Maria Denardo is the Fashion Director theFashion Spot at. Prior to joining tFS, she worked as...                     
									</p>
									<h5><a href="details_book.php?id=<?php echo$row['id'];?>" class="image d-block" class="blog-link">????????????</a></h5>
								</article>
							</div>

						</div>
					</div>


					<?php	

				}		  	

			}

			?>




			<?php


			mysqli_close($connection);
			?>




		</div>
	</div>
</section>

<!--=================================
Space Between footer and Content
===================================== -->
<section class="breadcrumb-section">
	<div class="breadcrumb-contents">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
			</ol>
		</nav>
	</div>
</section>
<!--=================================
	end Space Between footer and Content
	===================================== -->
<!--=================================
Footer Area
===================================== -->
<footer class="site-footer">
	<div class="footer-bottom">
		<div class="container">
			<p class="copyright-heading">?????? ?????????????? ?????????????? ?????????? <span> MOBC2301 </span> ?????????????? ?????????????????? - ???????? ?????????????????? ?????????????????? - ?????? ?????????????? ???????????????? ???????????????? ?????????????? ????????????</p>

			<p class="copyright-text">Copyright ?? 2020 <a href="#" class="author">HarouTaHa</a>. All Right Reserved. <br></p>
		</div>
	</div>
</footer>
