<div id="sidebar-nav" class="sidebar">
        <div class="sidebar-scroll">
            <nav>
                <ul class="nav">
                    <li><a href="/dashbord" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                    @if(auth()->user()->role == 'admin')
                        <li><a href="/siswa" class=""><i class="lnr lnr-user"></i> <span>Data Siswa</span></a></li>
                        <li><a href="/posts" class=""><i class="lnr lnr-pencil"></i> <span>Post</span></a></li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
