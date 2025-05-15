<!-- Sidebar -->
        <nav id="sidebar" class="bg-dark">
            <div class="sidebar-header text-center py-4">
                <h4 class="text-white"><i class="bi bi-speedometer2"></i> Admin Panel</h4>
            </div>
            <ul class="list-unstyled components">
                <li class="active">
                    <a href="{{route('admin.statistice')}}"><i class="bi bi-speedometer2 me-2"></i>Statistice</a>
                </li>
                <li>
                    <a href="{{ route('menu.index')}}"><i class="bi bi-tags me-2"></i> Menu</a>
                    
                </li>
                <li>
                    <a href="{{ route('product.index')}}"><i class="bi bi-file-earmark-post me-2"></i> Product</a>
                </li>
                <li>
                    <a href="#"><i class="bi bi-file-earmark-post me-2"></i> Commande</a>
                </li>
                  <li>
                    <a href="#"><i class="bi bi-file-earmark-post me-2"></i>Table Reservation </a>
                </li>
                <li>
                    <a href="#"><i class="bi bi-people me-2"></i> Users</a>
                </li>
                {{-- <li>
                    <a href="#"><i class="bi bi-gear me-2"></i> Settings</a>
                </li> --}}
            </ul>
        </nav>