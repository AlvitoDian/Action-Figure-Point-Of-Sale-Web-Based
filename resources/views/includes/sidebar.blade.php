   <!-- Sidebar -->
        <ul class="navbar-nav {{-- bg-gradient-primary --}} sidebar sidebar-dark accordion" id="accordionSidebar" style="background: linear-gradient(to bottom, #f8444f, #ca2d38);
">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <img src="{{ asset('img\logo.png') }}" alt="" style="width: 120px;">
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dasbor</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="buttons.html">Buttons</a>
                        <a class="collapse-item" href="cards.html">Cards</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="utilities-color.html">Colors</a>
                        <a class="collapse-item" href="utilities-border.html">Borders</a>
                        <a class="collapse-item" href="utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Transaksi Barang (Halaman User)
            </div>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('transaction.index') }}">
                    <i class="fas fa-fw fa-cash-register"></i>
                    <span>Daftar Barang</span></a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="{{ route('transaction-user') }}">
                    <i class="fas fa-fw fa-file-invoice"></i>
                    <span>Daftar Transaksi</span></a>
            </li>

            @if(auth()->user()->hasRole('ADMIN'))
            <!-- Heading -->
            <div class="sidebar-heading">
                Kelola Barang (Halaman Admin)
            </div>
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('product.index') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Daftar Barang</span></a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="{{ route('category.index') }}">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Daftar Kategori Barang</span></a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="{{ route('transaction-admin') }}">
                    <i class="fas fa-fw fa-file-invoice"></i>
                    <span>Daftar Transaksi User</span></a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Daftar User</span></a>
            </li>
            @endif

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            

        </ul>
        <!-- End of Sidebar -->