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
            <h1 class="m-0">عرض التصنيفات</h1>
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
              <th>التصنيف</th>
              
            </tr>
          </thead>


          <tbody>
            
           <?php 
           $query = "SELECT id,category_name from categorys";

           $result = mysqli_query($connection,$query);

           if(mysqli_num_rows($result)>0){

            while ($row =  mysqli_fetch_assoc($result)) {
              echo '<tr>'.'<td>'.$row['id'].'</td>'.'<td>'.$row['category_name'].'</td>'.'<td><a class="btn btn-info btn-sm" href="edit_category.php?id='.$row['id'] .'">تعديل</a></td>'. 
              '<td><form action="delete_category.php" method="POST">
              <input type="hidden" name="id-category" value="'.$row['id'].'">
              <button class="btn btn-danger btn-sm" type="button" class="btn-danger" id="delete-btn">حذف</button>
              </form></td>'.'</tr>';
            }
          }

          mysqli_close($connection);
          ?>
          
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
<script type="text/javascript">
 
  $('button').click(function (event) {
    event.preventDefault();
    var result=confirm("Are you sure?");
    if(result == true){
      $(this).parent('form').submit();
    }
    
  });


</script>