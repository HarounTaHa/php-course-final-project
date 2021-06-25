<?php
include('temp_parts/navbar.php');
include('temp_parts/sidebar.php');
include('dashboard_base.php');
include('../../../database/databaseConnection.php');

	if(isset($_GET['id'])){
		$id=$_GET['id'];

		$query="SELECT category_name from categorys where id=$id";

		 $result = mysqli_query($connection,$query);
	  if(mysqli_num_rows($result)>0){
	  	$row = mysqli_fetch_assoc($result);
	  }
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
            <h1 class="m-0">تعديل تصنيف</h1>
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
          $id=$_GET['id'];
          $name_category=$_POST['name-category'];
      	if(!empty($id) && !empty($name_category)){
		
		 $query_edit = "UPDATE categorys set category_name= '$name_category' where id =$id";
		 $result_edit = mysqli_query($connection,$query_edit);  

		 if($result_edit){
                echo '<div class="card-header">
                <h3 class="card-title">edit category</h3>
            </div>';
              }else{

        	  echo '<div class="card-header">
              	  <h3 class="card-title">canot edit category</h3>
          			  </div>';
              }

      	}else{
      		 echo '<div class="card-header">
              	  <h3 class="card-title">Some fileds are missing</h3>
            </div>';
      	}


    }

           ?>


              <form id='my-form' method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']).'?id='.$_GET['id']; ?>">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>اسم التصنيف</label>
                                <input name="name-category" type="text" class="form-control"
                             value="<?= ((isset($row)) ? $row['category_name'] : "") ?>" 

                                >
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