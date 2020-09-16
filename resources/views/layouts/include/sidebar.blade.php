
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
          <div class="sidebar-brand-icon rotate-n-15">
            {{-- <i class="fas fa-laugh-wink"></i> --}}
          </div>
          <div class="sidebar-brand-text mx-3">Pengajuan <sup>Surat</sup></div>
        </a>


        
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        
        @if (auth()->user())
        
        @can('isAdmin')
        <!-- Dashboard -->
        <li class="nav-item {{ Request::path() === 'Administrator/home' ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('home.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>
  
        <!-- Divider -->
        <hr class="sidebar-divider">
  
        {{-- <!-- Heading -->
        <div class="sidebar-heading">
          Interface
        </div> --}}
  
        <!-- Tambah Pengajuan -->
        <li class="nav-item {{ Request::path() === 'Administrator/pengajuan/create' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('pengajuan.create') }}">
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>Tambah Pengajuan</span></a>
          </li>

        
        <!-- Divider -->
        <hr class="sidebar-divider">
  
        <!-- Riwayat -->
        <li class="nav-item {{ Request::path() === 'Administrator/riwayat' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('riwayat.pengajuan') }}">
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>Riwayat</span></a>
          </li>
  
        <!-- Divider -->
        <hr class="sidebar-divider">
  
        <!-- Heading -->
        {{-- <div class="sidebar-heading">
          Addons
        </div> --}}
  
        <!-- MAster -->
        <li class="nav-item {{ Request::path() === 'Administrator/kategori' ? 'active' : '' }}">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Master Data</span>
          </a>
          <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="{{ route('kategori.index') }}">Data Kategori Surat</a>
              <a class="collapse-item" href="{{ route('admin.index') }}">Data Pegawai</a>
            </div>
          </div>
        </li>
        <!-- Rekap -->
        <li class="nav-item {{ Request::path() === 'Administrator/kategori' ? 'active' : '' }}">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Rekap </span>
          </a>
          <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="{{ route('rekap.tahun') }}">Rekap Tahun</a>
            
            </div>
          </div>
        </li>
        @endcan
        
        @can('isKades')
          <!-- Nav Item - Dashboard -->
          <li class="nav-item {{ Request::path() === 'Administrator/home' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('home.index') }}">
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>Dashboard</span></a>
          </li>
           <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item {{ Request::path() === 'Administrator/riwayat' ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('riwayat.pengajuan') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Riwayat</span></a>
        </li>
        @endcan

        @can('isStaff')
          <!-- Nav Item - Dashboard -->
          <li class="nav-item {{ Request::path() === 'Administrator/home' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('home.index') }}">
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>Dashboard</span></a>
          </li>
        <li class="nav-item {{ Request::path() === 'Administrator/riwayat' ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('riwayat.pengajuan') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Riwayat</span></a>
        </li>
        <li class="nav-item {{ Request::path() === 'Administrator/kategori' ? 'active' : '' }}">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Rekap </span>
          </a>
          <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="{{ route('rekap.tahun') }}">Rekap Tahun</a>
             
            </div>
          </div>
        </li>
        @endcan
       
        <li class="nav-item">
         
            <a class="nav-link collapsed" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                <i class="fas fa-fw fa-folder"></i>
                <span>Logout</span>
            </a>

            
           

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
  
         <!-- Sidebar Toggler (Sidebar) -->
         <div class="text-center d-none d-md-inline">
           <button class="rounded-circle border-0" id="sidebarToggle"></button>
         </div>
   
       </ul>
       <!-- End of Sidebar -->
            
        @elseif(auth()->guard('warga'))
        <li class="nav-item">
          <a class="nav-link" href="{{ route('warga.home') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>Home</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('warga.dashboard') }}">
            <i class="fas fa-fw fa-paper-plane"></i>
            <span>Pesan Surat</span></a>
        </li>

        
  
        <li class="nav-item">
          <a class="nav-link" href="{{ route('warga.riwayat') }}">
            <i class="fas fa-fw fa-history"></i>
            <span>Riwayat Pemesanan</span></a>
        </li>
  
        <li class="nav-item">
          <a class="nav-link" href="{{ route('warga.logout') }}">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
        </li>
  
         <!-- Divider -->
         <hr class="sidebar-divider d-none d-md-block">
  
         <!-- Sidebar Toggler (Sidebar) -->
         <div class="text-center d-none d-md-inline">
           <button class="rounded-circle border-0" id="sidebarToggle"></button>
         </div>
   
       </ul>
       <!-- End of Sidebar -->
        @endif
      
  



     

        