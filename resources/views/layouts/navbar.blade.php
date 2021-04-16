<nav class="navbar is-fixed-top column is-12">
    <div class="container has-text-centered">
        <a role="button" class="navbar-burger" data-target="burger-menu">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
        <div id="burger-menu" class="navbar-menu">
            <div class="navbar-start is-hidden-desktop">
                <a class="navbar-item" href="">Home</a>
                <a class="navbar-item" href=create">Add new user</a>
                <a class="navbar-item" href=update">Update</a>
            </div>
            <div class="navbar-end">
                <div class="navbar-item has-dropdown is-hoverable">
                    <div class="navbar-item">
                        <a class="navbar-link">
                            Settings
                        </a>
                        <div class="navbar-dropdown is-right">
                            <span class="icon-text navbar-item">
                                <a href="" class='has-text-primary'>
                                    <span class="icon">
                                        <i class="fas fa-user"></i>
                                    </span>
                                    <span>{{ Auth::user()->name ?? '' }}</span>
                                </a>
                            </span>
                            <hr class="navbar-divider">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                <span class="icon-text navbar-item ">
                                    <button class='button is-info is-outlined is-rounded is-small'>
                                        <span class='p-4'>Logout</span> <i class="fas fa-sign-out-alt"></i>
                                    </button>
                                </span>
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
