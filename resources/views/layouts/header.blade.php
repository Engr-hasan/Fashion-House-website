<div class="navbar-inner">
    <div class="container-fluid">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <a class="brand" href="index.html"><strong>FASHION</strong></a>
        <div class="nav-no-collapse header-nav">
            <ul class="nav pull-right">
                <li class="dropdown hidden-phone">
                    <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="halflings-icon white warning-sign"></i>
                    </a>
                </li>
                <li class="dropdown">
                    <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="halflings-icon white user"></i> Hasan Mahmud
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-menu-title">
                            <span>Account Settings</span>
                        </li>
                        <li><a href="#"><i class="halflings-icon user"></i> Profile</a></li>
                        <li>
                            </form>
                            <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            <i class="halflings-icon off"></i> Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>