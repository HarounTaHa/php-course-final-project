<?php

include('../database/databaseConnection.php');

?>

<!DOCTYPE html>
<html lang="ar">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>مكتبتي</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../templates/plugins/fontawesome-free/css/all.min.css">
  <!-- Use Minified Plugins Version For Fast Page Load -->
  <link rel="stylesheet" type="text/css" media="screen" href="../templates/static/css/plugins.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="../templates/static/css/main.css" />
  <link rel="shortcut icon" type="image/x-icon" href="../templates/static/image/favicon.ico">
</head>

<body>
  <div class="site-wrapper" id="top">
    <div class="site-header d-none d-lg-block">
      <div class="header-middle pt--10 pb--10">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-3 ">
              <a href="" class="site-brand">
                <img src="../templates/static/image/logo_2.png" alt="">
              </a>
            </div>
            <div class="col-lg-3">
              <div class="header-phone ">

                <div class="text-center">
                  <p >Haroun TaHa</p>
                  <p class="font-weight-bold number">مكتبتي</p>
                  <p class="font-weight-bold number">+970597918088</p>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="main-navigation flex-lg-right">
                <ul class="main-menu menu-right ">
                  <li class="menu-item has-children">
                    <a href="index.php">الرئيسية</a>

                  </li>
                  <!-- Shop -->
                  <li class="menu-item has-children mega-menu">
                    <a href="../templates/dashboard_home.php">لوحة  التحكم</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="header-bottom pb--10">
        <div class="container">
          <div class="row align-items-center">



           <div class="col-lg-3">
            <nav class="category-nav">
              <div>
                <a  href="javascript:void(0)" class="category-trigger">
                  <i class="fa fa-bars"></i>مكونات الموقع</a>
                  <ul class="category-menu">

                   <?php 
                   $query = "SELECT id,author_id,publish_house_id,category_id,name_book,release_year,release_number from books";
                   $result = mysqli_query($connection,$query);

                   if(mysqli_num_rows($result)>0){      
                    while ($row =  mysqli_fetch_assoc($result)) {


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
                 }
               }         

// ---------------------------------------authors--------------------
               echo '<li class="cat-item has-children">
               <a href="">المؤلفون</a>  <ul class="sub-menu">';
               $query_featch_authors = "SELECT id,authorName from authors";
               $result_featch_authors = mysqli_query($connection,$query_featch_authors);
               if(mysqli_num_rows($result_featch_authors)>0){
                while ( $row_author= mysqli_fetch_assoc($result_featch_authors)){
                 ?>


                 <li>
                   <a href="nav_select_author.php?id= <?php echo $row_author['id']; ?> ">
                    <?php echo $row_author['authorName']?>
                    
                  </a>
                </li>
                



                <?php  
              }
            } 
            echo '</ul></li>';

// ---------------------------------------publish houses--------------------
            echo '<li class="cat-item has-children">
            <a href="">دور النشر </a>  <ul class="sub-menu">';
            $query_featch_publish_houses = "SELECT id,name_publish_house from publish_houses";
            $result_featch_publish_houses = mysqli_query($connection,$query_featch_publish_houses);
            if(mysqli_num_rows($result_featch_publish_houses)>0){
              while ( $row_publish_house= mysqli_fetch_assoc($result_featch_publish_houses)){
               ?>

               <li>
                 <a href="nav_select_publish_house.php?id= <?php echo $row_publish_house['id']; ?> "><?php echo $row_publish_house['name_publish_house']?></a></li>


                 <?php
               }
             } 
             echo '</ul></li>';


// ---------------------------------------categories--------------------
             echo '<li class="cat-item has-children">
             <a href="">التصنيفات</a>  <ul class="sub-menu">';
             $query_featch_categorys = "SELECT id,category_name from categorys";
             $result_featch_categorys = mysqli_query($connection,$query_featch_categorys);
             if(mysqli_num_rows($result_featch_categorys)>0){
              while ( $row_category= mysqli_fetch_assoc($result_featch_categorys)){
                ?>


                <li>
                  <a href="nav_select_category.php?id= <?php echo $row_category['id']; ?> "><?php echo $row_category['category_name']?></a></li>

                  <?php
                }
              }
              echo '</ul></li>';
              ?>



            </ul>
          </div>
        </nav>
      </div>  

      <div class="col-lg-8">
        <div class="header-search-block">
          <form id="form-search" style="text-align:center;" method="GET" action="search.php">
            <input name="keywords" id="myInput" type="text" placeholder="بحث عن كتاب">
          </form>
          <button onClick="search()" type="button" id='btn-search'>بحث</button>
        </div>
      </div>
    </div>       
  </div>
</div>
</div>
</div>


 <!--=================================
		 Space Between Hedear and Content
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
		 end Space Between Hedear and Content
    ===================================== -->


<!--=================================
		end Space Between footer and Content
    ===================================== -->


    <!-- Use Minified Plugins Version For Fast Page Load -->
    <script src="../templates/static/js/plugins.js"></script>
    <script src="../templates/static/js/ajax-mail.js"></script>
    <script src="../templates/static/js/custom.js"></script>

    <script>

      function search(){
       document.getElementById("form-search").submit();      
     };

   </script>
 </body>

 </html>