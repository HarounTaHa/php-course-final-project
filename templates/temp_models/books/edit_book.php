<?php
include('temp_parts/navbar.php');
include('temp_parts/sidebar.php');
include('dashboard_base.php');
include('../../../database/databaseConnection.php');


if(isset($_GET['id'])){
  $id=$_GET['id'];

  $query="SELECT id,author_id,publish_house_id,category_id,name_book,release_year,release_number from books where id=$id";

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
            <h1 class="m-0">تعديل كتاب</h1>
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
            $name_book = $_POST['name-book'];
            $release_year = $_POST['release-year'];
            $release_number = $_POST['release-number'];
            $author_id = $_POST['name-author'];
            $publish_house_id = $_POST['name-publish-house'];
            $category_id = $_POST['name-category'];

           $is_duplicated=false;

           $query_books = "SELECT name_book,release_number from books";
           $result_books = mysqli_query($connection,$query_books);
            if(mysqli_num_rows($result_books)>0){
               while ($row_books =  mysqli_fetch_assoc($result_books)) {
                      $nameBook=$row_books['name_book'];
                      $releaseNumber=$row_books['release_number'];
                 if($name_book == $nameBook){
                          if($release_number==$releaseNumber){
                                  $is_duplicated=true;
                          }
                 }  

               }
            }
         if(!$is_duplicated){
            $query = "UPDATE books SET author_id =' $author_id',publish_house_id= '$publish_house_id',category_id=' $category_id ',name_book='$name_book',release_year = '$release_year',release_number='$release_number'where id =$id";            
            $result = mysqli_query($connection, $query);


            if($result){
              echo '<div class="card-header bg-blue">
              <h3 class="card-title">edit book</h3>
              </div>';
            }else{

              echo '<div class="card-header bg-blue">
              <h3 class="card-title">canot edit book</h3>
              </div>';
              echo $connection->error;
            }


          }else{
             echo '<div class="card-header bg-red">
              <h3 class="card-title">book is duplicated</h3>
              </div>';
          }
        }

          ?>


          <!-- ------------------------------------------------------------------------------ -->
          <?php 
          $query_authors = "SELECT id,authorName from authors";

          $result_authors = mysqli_query($connection,$query_authors);

// -----------------------------------------------------------------------
          $query_categorys = "SELECT id,category_name from categorys";

          $result_categorys = mysqli_query($connection,$query_categorys);

// -----------------------------------------------------------------------------
          $query_publish_houses = "SELECT id,name_publish_house from publish_houses";

          $result_publish_houses = mysqli_query($connection,$query_publish_houses);

          ?>





          <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']).'?id='.$_GET['id']; ?>">
            <div class="card-body">
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label>اسم الكتاب</label>
                    <input name="name-book" type="text" class="form-control"
                    value="<?= ((isset($row)) ? $row['name_book'] : "") ?>" 
                    >
                  </div>
                </div>

              </div>

              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label>إصدار سنة</label>
                    <input name="release-year" type="number" class="form-control"
                    value="<?= ((isset($row)) ? $row['release_year'] : "") ?>" 
                    >
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label>رقم الإصدار</label>
                    <input name="release-number" type="number" class="form-control"
                    value="<?= ((isset($row)) ? $row['release_number'] : "") ?>" 

                    >
                  </div>
                </div>
              </div>
              <!-- Date -->


              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label>تحديد مؤلف</label>
                    <select name="name-author" class="form-control">
                     <option value="">---</option>
                     <?php
                     if(mysqli_num_rows($result_authors)>0){
                      while ($row_authors =  mysqli_fetch_assoc($result_authors)) {

                        if($row['author_id']==$row_authors['id']){
                         echo '<option value="'.$row_authors['id'].'"
                         selected>'.$row_authors['authorName'].'</option>';
                       }else{
                        echo '<option value="'.$row_authors['id'].'"
                        >'.$row_authors['authorName'].'</option>';
                      }
                    }
                  }

                  ?>


                </select>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label>تحديد دار نشر</label>
                <select name="name-publish-house" class="form-control">
                  <option value="False">---</option>

                  <?php
                  if(mysqli_num_rows($result_publish_houses)>0){
                    while ($row_publish_houses =  mysqli_fetch_assoc($result_publish_houses)) {
                     if($row['publish_house_id']==$row_publish_houses['id']){
                       echo '<option value="'.$row_publish_houses['id'].'"
                       selected>'.$row_publish_houses['name_publish_house'].'</option>';
                     }else{
                       echo '<option value="'.$row_publish_houses['id'].'">'.$row_publish_houses['name_publish_house'].'</option>';
                     }
                   }
                 }


                 ?>

               </select>
             </div>
           </div>
         </div>

         <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label>تحديد تصنيف</label>
              <select name="name-category" class="form-control" >
                <option value="False">---</option>

                <?php
                if(mysqli_num_rows($result_categorys)>0){
                  while ($row_categorys =  mysqli_fetch_assoc($result_categorys)) {

                   if($row['category_id']==$row_categorys['id']){
                     echo '<option value="'.$row_categorys['id'].'"
                     selected>'.$row_categorys['category_name'].'</option>';
                   }else{
                     echo '<option value="'.$row_categorys['id'].'">'.$row_categorys['category_name'].'</option>';
                   }
                 }
               }


               ?>
             </select>
           </div>
         </div>
       </div>
     </div>
     <!-- /.card-body -->

     <div class="card-footer">
      <div class="row">
        <div class="col-11"></div>
        <button type="submit" class="btn btn-success btn-block">Submit</button>
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