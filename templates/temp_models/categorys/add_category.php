<?php
include('temp_parts/navbar.php');
include('temp_parts/sidebar.php');
include('dashboard_base.php');
include('../../../database/databaseConnection.php');
?>

<div class="wrapper">	
  <!-- /.content-wrapper -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">إضافة تصنيف</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">الرئيسية</a></li>
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
        <div class="row">
       <div class="col-12 card card-warning">

          <?php
            if($_SERVER['REQUEST_METHOD']=='POST'){
              $name=$_POST['name-category'];
         if(!empty($name)){
          $query = "INSERT INTO categorys(id,category_name) Values ('','$name')";
            
        $result = mysqli_query($connection, $query);
              if($result){
                echo '<div class="card-header  bg-green">
                <h3 class="card-title">added category</h3>
            </div>';
              }else{

          echo '<div class="card-header  bg-red">
                <h3 class="card-title">canot add category</h3>
            </div>';
              }

            }else{
      echo '<div class="card-header bg-red">
                <h3 class="card-title">category is empty</h3>
            </div>';
}

}

           ?>


              <form id='my-form' method="post" action="">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>اسم التصنيف</label>
                                <input name="name-category" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <div class="row">
                        <div class="col-11"></div>
                        <button type="submit" class="btn btn-warning">إضافة</button>
                    </div>
                </div>
     
                </div>
            </form>

        <!-- /.row -->
        <!-- /.row (main row) -->
   	 </div>
 </div>
        </div><!-- /.container-fluid -->
</section>
    <!-- /.content -->
</div>

</div>