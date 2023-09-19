<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            Sashwat<span> UM</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item @if (request()->routeIs('dashboard')) active @endif">
                <a href="/dashboard" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            {{-- <li class="nav-item @if (request()->routeIs('control')) active @endif">
                <a href="/controller" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Controller</span>
                </a>
            </li> --}}
            <li class="nav-item nav-category">Teacher</li>
            <li id="form" class="nav-item ">
                <a href="{{ route('form') }}" class="nav-link">
                    <i class="link-icon" data-feather="calendar"></i>
                    <span class="link-title">Form</span>
                </a>
            </li>

            {{-- @if (Auth::user()->role == 'admin') --}}
            <li id="teacher" class="nav-item ">
                <a href="{{ route('teacher') }}" class="nav-link">
                    <i class="link-icon" data-feather="feather"></i>
                    <span class="link-title">Teachers</span>
                </a>
            </li>
            {{-- @endif --}}

            <li class="nav-item nav-category">School Classess</li>
            <li
                class="nav-item @if (request()->routeIs('class')) active @elseif (request()->routeIs('control')) active @elseif (request()->routeIs('section')) active @endif">
                <a class="nav-link " data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false"
                    aria-controls="uiComponents">
                    <i class="link-icon" data-feather="feather"></i>
                    <span class="link-title">School Kit</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="uiComponents">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('control') }}" class="nav-link">School</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('class') }}" class="nav-link">Class</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('section') }}" class="nav-link">Section</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('periods') }}" class="nav-link">Period</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item nav-category">Relation Classess</li>
            <li
                class="nav-item @if (request()->routeIs('class.section')) active @elseif (request()->routeIs('period.time.relation')) active @endif">
                <a class="nav-link " data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false"
                    aria-controls="uiComponents">
                    <i class="link-icon" data-feather="feather"></i>
                    <span class="link-title">School Relation Kit</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="uiComponents">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('relationclasssection') }}" class="nav-link">Class-Section</a>
                        </li>
                    </ul>
                </div>
            </li>


            {{-- <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#authPages" role="button"
                    aria-expanded="false" aria-controls="authPages">
                    <i class="link-icon" data-feather="unlock"></i>
                    <span class="link-title">Authentication</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="authPages">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="pages/auth/login.html" class="nav-link">Login</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/auth/register.html" class="nav-link">Register</a>
                        </li>
                    </ul>
                </div>
            </li> --}}
            {{-- <li class="nav-item nav-category">Docs</li>
            <li class="nav-item">
                <a href="#" target="_blank"
                    class="nav-link">
                    <i class="link-icon" data-feather="hash"></i>
                    <span class="link-title">Documentation</span>
                </a>
            </li> --}}
        </ul>
    </div>
</nav>
