<nav class="navbar navbar-inverse" style="border-radius: 0px;">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ url('/') }}">
            <a class="navbar-brand" href="{{ url('/') }}"><img style="top:0px;" class="logo" src="/storage/admin/logo.png" alt=""></a>
        </a>
    </div>
    <div class="collapse navbar-collapse" id="app-navbar-collapse" style="padding-top:20px;">
        <ul class="nav navbar-nav" style="padding-left:40px;">
            
            <!--<li class="{{ (request()->is('about')) ? 'active' : '' }}"><a class="nav-link" href="/about" ><strong>About</strong></a></li>
            <li class="{{ (request()->is('services')) ? 'active' : '' }}"><a class="nav-link " href="/services"><strong>Services</strong></a></li>-->
            
        </ul>
        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right" style="padding-right:30px;">
            <!-- Authentication Links -->
            @guest
                <li><a href="{{ route('login') }}"><strong>Login</strong></a></li>
                <li><a href="{{ route('register') }}"><strong>Register</strong></a></li>
            @else
                <li class="dropdown {{ (request()->is('manage')||request()->is('SystemInformation')||request()->is('posts'))? 'active' : '' }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre style="position:relative;padding-left:50px;">
                        <img src="/storage/profile_images/{{Auth::user()->avatar}}" style="width:32px;height:32px;position:absolute;top:10px;left:10px;border-radius:50%"> 
                        <strong>{{ Auth::user()->name }}</strong> <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!--<li><a href="/dashboard"><strong>DashBoard</strong></a></li>-->
                        <li><a href="/manage"><strong>Manage</strong></a></li>
                        <!--<li><a href="/SystemInformation"><strong>Sys Info</strong></a></li>
                        <li><a href="/posts"><strong>Guest Info</strong></a></li>-->
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                <strong>Logout</strong>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
                <li  class="{{ (request()->is('/')) ? 'active' : '' }}"><a class="nav-link" href="/"  id="home"><strong><i class="fa fa-home fa-2x" aria-hidden="true"></i></strong></a></li>
                <li  class="{{ (request()->is('/mail')) ? 'active' : '' }}"><a class="nav-link" href="#"  id=""><strong><i class="fa fa-envelope fa-2x" aria-hidden="true"></i></strong></a></li>
            @endguest
        </ul>
    </div>
</nav>