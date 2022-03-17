<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link active">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('pets.index') }}"
       class="nav-link {{ Request::is('pets*') ? 'active' : '' }}">
        <p>Pets</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('users.index') }}"
       class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
        <p>Users</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('businessProfiles.index') }}"
       class="nav-link {{ Request::is('businessProfiles*') ? 'active' : '' }}">
        <p>Business Profiles</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('servicePackages.index') }}"
       class="nav-link {{ Request::is('servicePackages*') ? 'active' : '' }}">
        <p>Service Packages</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('subscribtionPackages.index') }}"
       class="nav-link {{ Request::is('subscribtionPackages*') ? 'active' : '' }}">
        <p>Subscribtion Packages</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('clientProfiles.index') }}"
       class="nav-link {{ Request::is('clientProfiles*') ? 'active' : '' }}">
        <p>Client Profiles</p>
    </a>
</li>




