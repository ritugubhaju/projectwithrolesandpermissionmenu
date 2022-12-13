<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Main</li>

                <li>
                    <a href="{{route('dashboard')}}" class="waves-effect">
                        <i class="mdi mdi-speedometer"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow" aria-expanded="false">
                        <i class="mdi mdi-share-variant"></i>
                        <span>Admin</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="true">
                        <li><a href="{{ route('user.index')}}" aria-expanded="false"><i class="fas fa-user"></i></i> Users</a></li>
                        <li><a href="{{ route('role.index')}}" aria-expanded="false"><i class="fa fa-tasks"></i> Roles</a></li>
                        <li><a href="{{ route('permission.index')}}" aria-expanded="false"><i class="fa fa-lock"></i> Permissions</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{route('menu.index')}}" class="waves-effect">
                        <i class="mdi mdi-speedometer"></i>
                        <span>Menu</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('about.index')}}" class="waves-effect">
                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                        <span>About</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('slider.index')}}" class="waves-effect">
                        <i class="fa fa-image"></i>
                        <span>Slider</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('blog.index')}}" class="waves-effect">
                        <i class="fas fa-blog"></i>
                        <span>Blogs</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow" aria-expanded="false">
                        <i class="fa fa-image"></i>
                        <span>Gallery</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="true">
                        <li><a href="{{ route('album.index')}}" aria-expanded="false"><i class="fas fa-layer-group"></i></i> Albums</a></li>
                        <li><a href="{{ route('gallery.index')}}" aria-expanded="false"><i class="fa fa-image"></i> Gallery</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{route('news.index')}}" class="waves-effect">
                    <i class="fas fa-newspaper"></i>
                        <span>News</span>
                    </a>
                </li>



            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
