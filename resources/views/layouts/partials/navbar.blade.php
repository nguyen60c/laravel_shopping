<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap"/>
                </svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
                @auth
                    @role('user')
                    <li><a href="{{ route('products.showProducts') }}" class="nav-link px-2 text-white">Products</a>
                    </li>
                    <li><a href="#" class="nav-link px-2 text-white">My Profile</a></li>
                    @endrole
                    @role('admin')
                    <li><a href="{{ route('users.index') }}" class="nav-link px-2 text-white">Users</a></li>
                    <li><a href="{{ route('roles.index') }}" class="nav-link px-2 text-white">Roles</a></li>
                    <li><a href="{{ route('permissions.index') }}" class="nav-link px-2 text-white">Permissions</a></li>
                    <li><a href="{{ route('products.index') }}" class="nav-link px-2 text-white">Products</a></li>
                    @endrole
                    @role('seller')
                    <li><a href="#" class="nav-link px-2 text-white">Selling products</a></li>
                    @endrole
                @endauth
            </ul>


            @auth
                {{ auth()->user()->name }}
                <div class="text-end">
                    @role("user")
                    <a href="#" class=" btn-dark position-relative  mx-3">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge
                        rounded-pill bg-danger" style="margin-top: -9px;margin-left: 3px">
                        99
                        <span class="visually-hidden">unread messages</span>
                        </span>
                    </a>

                    @endrole
                    <a href="{{ route('logout.perform') }}" class="btn btn-outline-light me-2">Logout</a>
                </div>
            @endauth

            @guest
                <div class="text-end">
                    <a href="{{ route('login.perform') }}" class="btn btn-outline-light me-2">Login</a>
                    <a href="{{ route('register.perform') }}" class="btn btn-warning">Sign-up</a>
                </div>
            @endguest
        </div>
    </div>
</header>
