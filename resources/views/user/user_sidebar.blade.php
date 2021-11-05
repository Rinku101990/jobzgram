<ul class="navigation contacts">
    <li><a href="{{ url('dashboard') }}"> <i class="la la-home"></i> Dashboard</a></li>
    <li><a href="{{ url('dashboard') }}"><i class="la la-user-tie"></i>My Profile</a></li>
    <li><a href="{{ url('dashboard') }}"><i class="la la-briefcase"></i> Applied Jobs </a></li>
    <li><a href="{{ url('change-password') }}"><i class="la la-lock"></i>Change Password</a></li>
    <li>
        <a href="{{ url('logout') }}"  onclick="event.preventDefault();
        document.getElementById('logout-form').submit();"><i class="la la-sign-out"></i>Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
        </form>
    </li>
</ul>