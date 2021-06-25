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
            <h1 class="m-0"> عرض الكتب </h1>
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
                   <th>اسم الكتاب</th>
                   <th>صدر سنة</th>
                   <th>رقم الإصدار</th>
                                    <th>اسم المؤلف</th>
                                       <th>التصنيف</th>
                                      <th>دار النشر</th>

              </tr>
        </thead>


         <tbody>

        <?php 
$query = "SELECT id,author_id,publish_house_id,category_id,name_book,release_year,release_number from books";
            $result = mysqli_query($connection,$query);

            if(mysqli_num_rows($result)>0){      
            while ($row =  mysqli_fetch_assoc($result)) {
                    echo '<tr>'.'<td>'.$row['id'].'</td>'.'<td>'.$row['name_book'].'</td>'.'<td>'.$row['release_year'].'</td>'.'<td>'.$row['release_number'].'</td>';
                // -------------------------------------------------
                 $author_id=$row['author_id'];
                 $publish_house_id=$row['publish_house_id'];
                 $category_id=$row['category_id'];
                 // -------------------------------------------
                  $query_author = "SELECT authorName from authors where id= $author_id";
                   $result_author = mysqli_query($connection,$query_author);
                  if(mysqli_num_rows($result_author)>0){
                    $row_author= mysqli_fetch_assoc($result_author);
                    echo  '<td>'.$row_author['authorName'].'</td>';
                 }

     
                 // ---------------------------------------------------

                $query_category = "SELECT category_name from categorys where id = $category_id";
                $result_category=mysqli_query($connection,$query_category);
                    if(mysqli_num_rows($result_category)>0){
                    $row_category= mysqli_fetch_assoc($result_category);
                    echo  '<td>'.$row_category['category_name'].'</td>';
                 }

                // --------------------------------------------
                    $query_publish_house= "SELECT name_publish_house from publish_houses where id= $publish_house_id";
                   $result_publish_house = mysqli_query($connection,$query_publish_house);
                  if(mysqli_num_rows($result_publish_house)>0){
                    $row_publish_house= mysqli_fetch_assoc($result_publish_house);
                    echo  '<td>'.$row_publish_house['name_publish_house'].'</td>';
                 }

               echo '<td><a class="btn btn-info btn-sm" href="edit_book.php?id='.$row['id'] .'">تعديل</a></td>'. 
               '<td><form action="delete_book.php" method="POST">
                <input type="hidden" name="id-book" value="'.$row['id'].'">
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