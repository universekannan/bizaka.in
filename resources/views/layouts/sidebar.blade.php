<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<a href="{{ route('dashboard') }}" class="brand-link">
		<img src="{{ asset('/AdminLTELogo.png') }}" class="brand-image img-circle elevation-3">
		<span class="brand-text font-weight-light">{{ config('app.name') }}</span>
	</a>
	<div class="sidebar">
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-item has-treeview {{ ((request()->segment(1) =='dashboard')) ? 'menu-open' : '' }}">
					<a href="{{ route('dashboard') }}" class="nav-link">
						<i class="nav-icon fas fa-home"></i>
						<p>Dashboard</p>
					</a>
				</li>
				 <li class="nav-item has-treeview {{ ((request()->segment(1) =='member') || request()->is('members') || request()->is('viewmembers') || request()->is('addmember')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
             <i class="far fa-user nav-icon"></i>
              <p>
                Manage Member 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('members') }}" class="nav-link {{ (request()->is('members') || (request()->segment(1) =='members')) ? 'active' : '' }}">
                  <i class="nav-icon fas fa-th"></i>
                  <p>View Members</p>
                </a>
              </li> 
			  <li class="nav-item">
                <a href="{{ route('geneology') }}" class="nav-link {{ (request()->is('geneology')) ? 'active' : '' }}">
                  <i class="nav-icon fas fa-tree"></i>
                  <p>Geneology</p>
                </a>
              </li>
            </ul>
          </li>
		  
		  
		  
		   <li class="nav-item has-treeview {{ (request()->is('adminIncome') || request()->is('fasttrack') || request()->is('autoPool') || request()->is('sponsor')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-arrow-up"></i>
              <p>
                Manage Income
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link {{ (request()->is('sponsor')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sponsor Income</p>
                </a>
              </li>
            </ul>
          </li>
		  
		  
		  
		   <li class="nav-item has-treeview {{ ((request()->segment(1) =='profile') || request()->is('changepassword')) ? 'menu-open' : '' }}">
				<a href="" class="nav-link">
				  <i class="nav-icon fas fa-user"></i>
				  <p>
				  {{ Auth::user()->name; }}
					 <i class="fas fa-angle-left right"></i>
				  </p>
				</a>
				<ul class="nav nav-treeview">
				  <li class="nav-item">
					 <a href="{{ route('profile') }}" class="nav-link {{ (request()->is('profile')) ? 'active' : '' }}">
						<i class="far fa-circle nav-icon"></i>
						<p>Edit Profile</p>
					 </a>
				  </li>
				  <li class="nav-item">
					 <a href="{{ route('changepassword') }}" class="nav-link {{ (request()->is('changepassword')) ? 'active' : '' }}">
						<i class="far fa-circle nav-icon"></i>
						<p>Change Password</p>
					 </a>
				  </li>
				  <li class="nav-item">
					 <a href="{{ route('logout') }}" class="nav-link ">
						<i class="far fa-circle nav-icon"></i>
						<p>Logout</p>
					 </a>
				  </li>
				</ul>
			</li>
			</ul>
		</nav>
	</div>
</aside>
