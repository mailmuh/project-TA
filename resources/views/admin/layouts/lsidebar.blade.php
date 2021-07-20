<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="{{asset('assets/images/user.png')}}" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</div>
            <div class="email">{{ Auth::user()->email}}</div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <!-- <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                    <li role="separator" class="divider"></li> -->
                    <!-- <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li> -->
                    <li role="separator" class="divider"></li>
                    <li><a href="{{ route('logout') }}" 
                        onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"
                        ><i class="material-icons">input</i>Sign Out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            @if(Auth::User()->role === 'superadmin')
            <li class="{{ Request::is('home')?'active':'' }}">
                <a href="/home">
                    <i class="material-icons">home</i>
                    <span>Home</span>
                </a>
            </li>
            <li class="{{ Request::is('/penunggupasiens*')?'active':'' }}, {{ Request::is('penunggupasiens')?'active':'' }}">
                <a href="/penunggupasiens">
                    <i class="material-icons">assignment</i>
                    <span>Data Pemohon</span>
                </a>
            </li>
            <li class="{{ Request::is('verifikasi')?'active':'' }}">
                <a href="/verifikasi">
                    <i class="material-icons">playlist_add_check</i>
                    <span>Data Verifikasi</span>
                </a>
            </li>
            <li class="{{ Request::is('pembayarans')?'active':'' }}">
                <a href="/pembayarans">
                    <i class="material-icons">payment</i>
                    <span>Data Pembayaran</span>
                </a>
            </li>
            <li class="{{ Request::is('useradmins')?'active':'' }}">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">people</i>
                    <span>Kelola Akun</span>
                </a>
                <ul class="ml-menu">
                <li class="{{ Request::is('useradmins')?'active':'' }}">
                        <a href="/useradmins">Akun Admin</a>
                    </li>
                    <li class="{{ Request::is('userpemohons')?'active':'' }}">
                        <a href="/userpemohons">Akun Pemohon</a>
                    </li>
                </ul>
            </li>
            @elseif(Auth::User()->role === 'admindinsos')
            <li class="{{ Request::is('home')?'active':'' }}">
                <a href="/home">
                    <i class="material-icons">home</i>
                    <span>Home</span>
                </a>
            </li>
            <li class="{{ Request::is('/penunggupasiens*')?'active':'' }}, {{ Request::is('penunggupasiens')?'active':'' }}">
                <a href="/penunggupasiens">
                    <i class="material-icons">assignment</i>
                    <span>Data Pemohon</span>
                </a>
            </li>
            <li class="{{ Request::is('verifikasi')?'active':'' }}">
                <a href="/verifikasi">
                    <i class="material-icons">playlist_add_check</i>
                    <span>Data Verifikasi</span>
                </a>
            </li>
            <li class="{{ Request::is('pembayarans')?'active':'' }}">
                <a href="/pembayarans">
                    <i class="material-icons">payment</i>
                    <span>Data Pembayaran</span>
                </a>
            </li>
            <li class="{{ Request::is('useradmins')?'active':'' }}">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">people</i>
                    <span>Kelola Akun</span>
                </a>
                <ul class="ml-menu">
                <li class="{{ Request::is('useradmins')?'active':'' }}">
                        <a href="/useradmins">Akun Admin</a>
                    </li>
                    <li class="{{ Request::is('userpemohons')?'active':'' }}">
                        <a href="/userpemohons">Akun Pemohon</a>
                    </li>
                </ul>
            </li>
            @elseif(Auth::user()->role === 'adminkardinah')
            <li class="{{ Request::is('home')?'active':'' }}">
                <a href="/home">
                    <i class="material-icons">home</i>
                    <span>Home</span>
                </a>
            </li>
            <li class="{{ Request::is('/penunggupasiens*')?'active':'' }}, {{ Request::is('penunggupasiens')?'active':'' }}">
                <a href="/penunggupasiens">
                    <i class="material-icons">assignment</i>
                    <span>Data Pemohon</span>
                </a>
            </li>
            @endif
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; 2021 <a href="javascript:void(0);">Dinas Sosial Kota Tegal</a>.
        </div>
        <!-- <div class="version">
            <b>Version: </b> 1.0.5
        </div> -->
    </div>
    <!-- #Footer -->
</aside>