<?php

include('../templates/index_base.php');
include('../database/databaseConnection.php');


if(isset($_GET['id'])){
  $id=$_GET['id'];

  $query="SELECT id,author_id,publish_house_id,category_id,name_book,release_year,release_number from books where id=$id";

  $result = mysqli_query($connection,$query);
  if(mysqli_num_rows($result)>0){
    $row = mysqli_fetch_assoc($result);


    ?>


  <!--=================================
		Content
    ===================================== -->

    <section class="inner-page-sec-padding-bottom space-db--30">


      <div class="container">
        <div class="blog-post post-details mb--50">
          <div class="blog-image">
            <img height ="350" src="../templates/static/image/others/book_photo.jpg
            
            " alt="">



            <?php 
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

            $query_category = "SELECT id,category_name from categorys where id = $category_id";
            $result_category=mysqli_query($connection,$query_category);
            if(mysqli_num_rows($result_category)>0){
             $row_category= mysqli_fetch_assoc($result_category);
                    // echo  '<td>'.$row_category['category_name'].'</td>';
           }

           $query_publish_house= "SELECT id,name_publish_house from publish_houses where id= $publish_house_id";
           $result_publish_house = mysqli_query($connection,$query_publish_house);
           if(mysqli_num_rows($result_publish_house)>0){
             $row_publish_house= mysqli_fetch_assoc($result_publish_house);
                    // echo  '<td>'.$row_publish_house['name_publish_house'].'</td>';
           }      

           
           ?>

         </div>
         <div class="blog-content mt--30">
          <header>
            <h3 class="blog-title"><?php echo $row['name_book'] ?></h3>
            <div class="post-meta">
              <span class="post-author">
                <i class="fas fa-user"></i>
                <span class="text-gray">المؤلف : </span>
                <?php echo $row_author['authorName']; ?>
              </span>
              <span class="post-separator">|</span>
              
            </div>
          </header>
          <article>
           
            <blockquote>


              <h5>دار النشر   :   <b class="p-0"> <a href="nav_select_publish_house.php?id= <?php echo $row_publish_house['id']; ?>"> <?php echo $row_publish_house['name_publish_house']?>  </a> </b>
                
              </h5>

              <h5> <p> سننة الاصدار :  <?php echo $row['release_year']?></p>  </h5>

              <h5>   <p> رقم الاصدار :   <?php echo $row['release_number']?></p> </h5>
            </blockquote>
            <p>
             Lorem ipsum description
             Lorem ipsum description
             Lorem ipsum description
             Lorem ipsum description
           Lorem ipsum description</p>
         </article>
         <footer class="blog-meta">
          <div>  <h4> التصنيف:  </h4> <h3> <a href="nav_select_category.php?id= <?php echo $row_category['id']; ?>"><?php echo $row_category['category_name']?></a></h3></div>
        </footer>
      </div>
    </div>

    <?php  


  }
}

mysqli_close($connection);
?>


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
          <p class="copyright-heading">هذا المشروع النهائي لكورس <span> MOBC2301 </span> الجامعة الاسلامية - كلية تكنولوجيا المعلومات - قسم الحوسبة المتنقلة وتطبيقات الاجهزة الذكية</p>
          
          <p class="copyright-text">Copyright © 2020 <a href="#" class="author">HarouTaHa</a>. All Right Reserved. <br></p>
        </div>
      </div>
    </footer>