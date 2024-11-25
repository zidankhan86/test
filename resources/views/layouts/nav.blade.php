<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        {{-- <li class="nav-item d-none d-sm-inline-block">
                <a class="nav-link"><strong>Flame Flow</strong></a>
        </li> --}}
    </ul>
    <!-- Right navbar links -->
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto d-flex align-items-center">
        <li class="nav-item">
            <span id="live-clock"></span>
        </li>
        <li class="nav-item">
            <a class="nav-link">Welcome, <strong>{{ auth()?->user()?->name }}</strong></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">Logout
                &nbsp;
                <i class="fas fa-sign-out-alt"></i> </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
    <script>
        function displayTime() {
            var date = new Date();
            var time = date.toLocaleTimeString();
            var options = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            var dateStr = date.toLocaleDateString(undefined, options);
            document.getElementById("live-clock").innerHTML = time + " | " + dateStr;
        }
        setInterval(displayTime, 1000);
    </script>
</nav>
<!-- /.navbar -->
