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
				 <li class="nav-item has-treeview {{ ((request()->segment(1) =='member') || request()->is('members') || request()->is('geneology')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
             <i class="far fa-user nav-icon"></i>
              <p>
                Manage Member 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('members') }}" class="nav-link {{ (request()->is('members')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Members</p>
                </a>
              </li> 
            </ul>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('approvewithdraw') }}" class="nav-link {{ (request()->is('withdrawals')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>withdrawal</p>
                </a>
              </li> 
            </ul>

          </li>
		  
		  
		  
		   <li class="nav-item has-treeview {{ (request()->is('todayincome') || request()->is('totalincome')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-arrow-up"></i>
              <p>
                Manage Income
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('todayincome')}}" class="nav-link {{ (request()->is('todayincome')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Today Income</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('totalincome')}}" class="nav-link {{ (request()->is('totalincome')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Total Income</p>
                </a>
              </li>
            </ul>
          </li>

		    <li id="ManagingWallet" class="nav-item has-treeview {{ (request()->is('payment/create') || request()->is('wallet') || request()->is('withdrawal') || request()->is('requestpayment') || request()->is('transfer') || request()->is('newrequest')) ? 'menu-open' : '' }}">
            <a id="ManagingWallets" href="#" class="nav-link">
              <i class="nav-icon fas fa-wallet #2317"></i>
              <p>
                Managing Wallet
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
			
            <ul class="nav nav-treeview">
			    <li class="nav-item">
                <a id="Wallet" class="nav-link {{ (request()->is('wallet')) ? 'active' : '' }}" href="{{ url('wallet') }}/{{ date('Y-m-d' ,strtotime('-1 days')) }}/{{ date('Y-m-d') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Wallet</p>
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
