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
            <h1 class="m-0">عرض المؤلفون</h1>
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
        <table class="table">
       <thead>
              <tr>
                <th>#</th>
                   <th>الاسم</th>
              </tr>
        </thead>



         <tbody>
                 
          <?php 
            $query = "SELECT id,authorName from authors";

            $result = mysqli_query($connection,$query);

            if(mysqli_num_rows($result)>0){

                  while ($row =  mysqli_fetch_assoc($result)) {
                    echo '<tr>'.'<td>'.$row['id'].'</td>'.'<td>'.$row['authorName'].'</td>';
                  }
            }

            mysqli_close($connection);
          ?>


        <td>
             <a class="btn btn-info btn-sm" href="">تعديل</a>
             <a class="btn btn-danger btn-sm"  href="">حذف</a>
      </td>

  </tr>
                    
       </tbody>

 </table>


        <!-- /.row -->
        <!-- /.row (main row) -->
   	 </div>
 </div><!-- /.container-fluid -->
</section>
    <!-- /.content -->
</div>

</div>