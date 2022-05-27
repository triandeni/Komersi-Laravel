<div class="sidebar" data-color="purple" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">

    <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal text-decoration-none">
      Gaplexx Shop
      </a></div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="nav-item {{ Request::is('dashboard') ? 'active':'' }}  ">
          <a class="nav-link" href="/dashboard">
            <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item {{ Request::is('category') ? 'active':'' }} ">
          <a class="nav-link" href="/category">
            <i class="material-icons">category</i>
            <p>Category</p>
          </a>
        </li>
        <li class="nav-item {{ Request::is('product') ? 'active':'' }} ">
          <a class="nav-link" href="/product">
            <i class="material-icons">inventory</i>
            <p>Product</p>
          </a>
        </li>
        <li class="nav-item {{ Request::is('order') ? 'active':'' }} ">
          <a class="nav-link" href="/order">
            <i class="material-icons">book</i>
            <p>Order</p>
          </a>
        </li>
        <li class="nav-item {{ Request::is('user') ? 'active':'' }} ">
          <a class="nav-link" href="/user">
            <i class="material-icons">person</i>
            <p>User</p>
          </a>
        </li>
      


  
      </ul>
    </div>
  </div>