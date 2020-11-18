<div>
    <!-- Sidebar outter -->
    <div class="main-sidebar sidebar-style-2">
        <!-- sidebar wrapper -->
        <aside id="sidebar-wrapper">
            <!-- sidebar brand -->
            <div class="sidebar-brand">
                <a href="{{ route('welcome') }}">{{ config('app.name', 'My Blog') }}</a>
            </div>
            <!-- sidebar menu -->
            <ul class="sidebar-menu">
                <!-- menu header -->
                <li class="menu-header">General</li>
                <!-- menu item -->
                <li class="{{ Route::is('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-fire"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                {{-- <li class="{{ Route::is('profile') ? 'active' : '' }}">
                    <a href="{{ route('profile') }}">
                        <i class="fas fa-user"></i>
                        <span>Profile</span>
                    </a>
                </li> --}}
                <li>
                    <a href="{{ route('category.index') }}">
                        <i class="fas fa-shapes"></i>
                        <span>Categories List</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('post.index') }}">
                        <i class="fas fa-clipboard-list"></i>
                        <span>Post List</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('tag.index') }}">
                        <i class="fas fa-tags"></i>
                        <span>Tag List</span>
                    </a>
                </li>
            </ul>
        </aside>
    </div>
</div>