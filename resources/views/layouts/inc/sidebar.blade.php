
<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo navbar-brand"><a href="" class="simple-text logo-normal">
      Dream <span>Shop</span>
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item {{Request::is('dashboard')? 'active':''}}  ">
            <a class="nav-link" href="{{url('/dashboard')}}">
              
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item {{Request::is('categories')? 'active':''}} ">
            <a class="nav-link" href="{{url('categories')}}">
              
              <p>categories</p>
            </a>
          </li>
          <li class="nav-item  {{Request::is('addpropduct')? 'active':''}}">
            <a class="nav-link" href="{{url('addpropduct')}}">
            
              <p>Add Category</p>
            </a>
          </li>
          <li class="nav-item  {{Request::is('products')? 'active':''}}">
            <a class="nav-link" href="{{url('products')}}">
              
              <p>Products</p>
            </a>
          </li>
          <li class="nav-item  {{Request::is('add_product')? 'active':''}}">
            <a class="nav-link" href="{{url('add_product')}}">
              
              <p>Add Products</p>
            </a>
          </li>
          <li class="nav-item  {{Request::is('orders')? 'active':''}}">
            <a class="nav-link" href="{{url('orders')}}">
              
              <p>Orders</p>
            </a>
          </li>
          <li class="nav-item  {{Request::is('users')? 'active':''}}">
            <a class="nav-link" href="{{url('users')}}">
              
              <p>Users</p>
            </a>
          </li>
        </ul>
      </div>
    </div>