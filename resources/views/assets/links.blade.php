{{-- ALL USERS LINKS --}}
    <li class="nav-item"><a href="/home" class="text-left nav-link">Home</a></li>

{{-- ADMIN LINKS --}}
@if (Auth::user()->hasAccess('admin'))
    <li class="nav-item"><a href="/users" class="text-left nav-link">User Management</a></li>
    <li class="nav-item"><a href="/searchApplications" class="text-left nav-link">Search Applications</a></li>
@endif

{{-- HEADBOOKER LINKS --}}
@if (Auth::user()->hasAccess('headbooker'))
<li class="nav-item"><a href="/searchApplications" class="text-left nav-link">Search Applications</a></li>

@endif

{{-- BOOKER LINKS --}}
@if (Auth::user()->hasAccess('booker'))
    <li class="nav-item"><a href="/invite/test/measurements" class="text-left nav-link">Invites</a></li>
    <li class="nav-item"><a href="/searchApplications" class="text-left nav-link">Search Applications</a></li>
@endif

{{-- HEADSCOUT LINKS --}}
@if (Auth::user()->hasAccess('headscout'))
    <li class="nav-item"><a href="/searchApplications" class="text-left nav-link">Search Applications</a></li>
@endif

{{-- SCOUT LINKS --}}
@if (Auth::user()->hasAccess('scout'))
	<li class="nav-item"><a href="/form" class="text-left nav-link">New Contact</a></li>
    <li class="nav-item"><a href="/searchApplications" class="text-left nav-link">Search Applications</a></li>
    <li class="nav-item"><a href="/createApplication" class="text-left nav-link">Create New Application</a></li>
@endif