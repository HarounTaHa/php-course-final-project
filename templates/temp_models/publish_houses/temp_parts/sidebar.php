
<?php
session_start();
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">مكتبتي</span>
    </a>
    <!-- Sidebar -->
   <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['name'];?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="../../dashboard_home.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                لوحة التحكم
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                الكتب
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../books/show_books.php" class="nav-link">
                  <i class="fas fa-table nav-icon"></i>
                  <p>عرض</p>
                </a>
              </li>
                  <li class="nav-item">
                <a href="../books/add_book.php" class="nav-link">
                        <i class="fas fa-plus nav-icon"></i>
                  <p>اضافة</p>
                </a>
              </li>
            </ul>
          </li>
        <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-feather-alt"></i>
              <p>
                المؤلفون
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../authors/show_authors.php" class="nav-link">
                  <i class="fas fa-table nav-icon"></i>
                  <p>عرض</p>
                </a>
              </li>
                  <li class="nav-item">
                <a href="../authors/add_author.php" class="nav-link">
                        <i class="fas fa-user-plus nav-icon"></i>
                  <p>اضافة</p>
                </a>
              </li>

            </ul>
          </li>
            <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book-open"></i>
              <p>
                دور النشر
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="show_publish_houses.php" class="nav-link">
                  <i class="fas fa-table nav-icon"></i>
                  <p>عرض</p>
                </a>
              </li>
                  <li class="nav-item">
                <a href="add_publish_house.php" class="nav-link">
                        <i class="fas fa-plus nav-icon"></i>
                  <p>اضافة</p>
                </a>
              </li>
            </ul>
          </li>
            <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-layer-group"></i>
              <p>
                التصنيفات
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../categorys/show_categorys.php" class="nav-link">
                  <i class="fas fa-table nav-icon"></i>
                  <p>عرض</p>
                </a>
              </li>
                  <li class="nav-item">
                <a href="../categorys/add_category.php" class="nav-link">
                        <i class="fas fa-plus nav-icon"></i>
                  <p>اضافة</p>
                </a>
              </li>
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div> 

    <!-- /.sidebar -->
 </aside>