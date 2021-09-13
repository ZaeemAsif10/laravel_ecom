 <!-- Sidebar -->
 <div class="sidebar-fixed position-fixed">

<a class="logo-wrapper waves-effect">
  <img src="https://mdbootstrap.com/img/logo/mdb-email.png" class="img-fluid" alt="">
</a>

<div class="list-group list-group-flush">
  <a href="#" class="list-group-item active waves-effect">
    <i class="fas fa-chart-pie mr-3"></i>Dashboard
  </a>



  <a href="{{ url('/my-profile')}}" class="list-group-item list-group-item-action waves-effect">
    <i class="fas fa-user mr-3"></i>Profile</a>
    <a href="{{ url('registered-user') }}" class="list-group-item list-group-item-action waves-effect">
      <i class="fas fa-money-bill-alt mr-3"></i>Registered User
    </a>
</div>


              <div class="list-group list-group-flush">
                  <a class="nav-link waves-effect dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-user mr-3"></i>
                    Collections
                  </a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ url('group') }}">Group</a></a>
                    <a class="dropdown-item" href="{{ url('category') }}">Category</a></a>
                    <a class="dropdown-item" href="{{ url('sub-category') }}">Sub Category</a>
                    <a class="dropdown-item" href="{{ url('products') }}">Product (items)</a>
                  </div>
                </div>

</div>



<!-- Sidebar -->