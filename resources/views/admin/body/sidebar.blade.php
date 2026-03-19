<aside class="left-sidebar" style="margin-top:-65px"> <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between"> <a href="{{ url('/') }}"
                class="text-nowrap logo-img"> <img src="{{asset('assets/images/logos/logo.svg')}}" alt="" /> </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse"> <i
                    class="ti ti-x fs-6"></i> </div>
        </div> <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap"> <iconify-icon icon="solar:menu-dots-linear"
                        class="nav-small-cap-icon fs-4"></iconify-icon> <span class="hide-menu">Home</span> </li>
                <li class="sidebar-item"> <a class="sidebar-link" href="{{route('home')}}" aria-expanded="false"> <i
                            class="ti ti-atom"></i> <span class="hide-menu">Dashboard</span> </a> </li>
                 

  <li class="sidebar-item {{ request()->routeIs('booking.index') ? 'active' : '' }}">
    <a class="sidebar-link" href="{{ route('booking.index') }}" aria-expanded="false">
        <i class="ti ti-atom"></i>
        <span class="hide-menu">Booking</span>
    </a>
</li>


                <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('category.index') }}"
                        aria-expanded="false"> <i class="ti ti-atom"></i> <span class="hide-menu">Category</span> </a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('subcategory.index') }}"
                        aria-expanded="false"> <i class="ti ti-atom"></i> <span class="hide-menu">SubCategory</span>
                    </a> </li>
                <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('post.index') }}"
                        aria-expanded="false"> <i class="ti ti-atom"></i> <span class="hide-menu">Post</span> </a> </li>
                <!-- ---------------------------------- --> <!-- Dashboard -->
                <!-- ---------------------------------- -->
            </ul>
        </nav> <!-- End Sidebar navigation -->
    </div> <!-- End Sidebar scroll-->
</aside>