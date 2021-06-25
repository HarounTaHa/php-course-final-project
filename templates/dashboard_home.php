<?php
session_start();


if(isset($_SESSION['is_login']) && $_SESSION['is_login']){
include('temp_parts/navbar.php');
include('temp_parts/sidebar.php');
include('dashboard_base.php');
include('../database/databaseConnection.php');
}else{
    header('Location: http://localhost/web_course_project/templates/login.php ');
}


?>

<div class="wrapper">	
  <!-- /.content-wrapper -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">لوحة التحكم</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../public/">الرئيسية</a></li>
              <li class="breadcrumb-item active">لوحة التحكم</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <?php
      

           $query_books = "SELECT name_book,release_number from books";
           $result_books = mysqli_query($connection,$query_books);
 // ---------------------------------------------------------------------------
          $query_authors = "SELECT id,authorName from authors";
          $result_authors = mysqli_query($connection,$query_authors);
       // -----------------------------------------------------------------------------
          $query_categorys = "SELECT id,category_name from categorys";
          $result_categorys = mysqli_query($connection,$query_categorys);
       // -----------------------------------------------------------------------------
          $query_publish_houses = "SELECT id,name_publish_house from publish_houses";
          $result_publish_houses = mysqli_query($connection,$query_publish_houses);

        ?>

        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php  echo mysqli_num_rows($result_books); ?></h3>

                <p>الكتب</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-compose"></i>
              </div>
              <a href="temp_models/books/show_books.php" class="small-box-footer">المزيد <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php  echo mysqli_num_rows($result_authors); ?><sup style="font-size: 20px"></sup></h3>

                <p>المؤلفون</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-stalker"></i>
              </div>
              <a href="temp_models/authors/show_authors.php" class="small-box-footer">المزيد <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php  echo mysqli_num_rows($result_publish_houses); ?></h3>

                <p>دور النشر</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-home"></i>
              </div>
              <a href="temp_models/publish_houses/show_publish_houses.php" class="small-box-footer">المزيد <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php  echo mysqli_num_rows($result_categorys); ?></h3>

                <p>التصنيفات</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-pricetags"></i>
              </div>
              <a href="temp_models/categorys/show_categorys.php" class="small-box-footer">المزيد<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

</div>
