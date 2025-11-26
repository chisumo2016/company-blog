<div class="app-sidebar-menu">
<div class="h-100" data-simplebar>

<!--- Sidemenu -->
<div id="sidebar-menu">

    <div class="logo-box">
        <a href="index.html" class="logo logo-light">
        <span class="logo-sm">
            <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="" height="22">
        </span>
            <span class="logo-lg">
             <img src="{{ asset('backend/assets/images/logo-light.png') }}" alt="" height="24">
                        </span>
        </a>
        <a href="index.html" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="" height="22">
                        </span>
            <span class="logo-lg">
                            <img src="{{ asset('backend/assets/images/logo-dark.png') }}" alt="" height="24">
                        </span>
        </a>
    </div>

    <ul id="side-menu">

        <li class="menu-title">Menu</li>

        <li>
            <a href="{{ route('dashboard') }}" class="tp-link">
                <i data-feather="home"></i>
                <span> Dashboard </span>
            </a>
        </li>

        <li class="menu-title">Pages</li>

        <li>
            <a href="#testimonials" data-bs-toggle="collapse">
                <i data-feather="users"></i>
                <span> Testimonials / Reviews </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="testimonials">
                <ul class="nav-second-level">
                    <li>
                        <a href="{{ route('testimonials.index') }}" class="tp-link">View Reviews</a>
                    </li>

                    <li>
                        <a href="{{ route('testimonials.create') }}" class="tp-link">Create Review</a>
                    </li>


                </ul>
            </div>
        </li>

        <li>
            <a href="#slider" data-bs-toggle="collapse">
                <i data-feather="alert-octagon"></i>
                <span> Slider </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="slider">
                <ul class="nav-second-level">
                    <li>
                        <a href="{{ route('get.slider') }}" class="tp-link">Get Slider</a>
                    </li>
                </ul>
            </div>
        </li>

        <li>
            <a href="#features" data-bs-toggle="collapse">
                <i data-feather="alert-octagon"></i>
                <span> Features Setup </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="features">
                <ul class="nav-second-level">
                    <li>
                        <a href="{{ route('features.index') }}" class="tp-link">View Features</a>
                    </li>
                    <li>
                        <a href="{{ route('features.create') }}" class="tp-link">Create Features</a>
                    </li>

                </ul>
            </div>
        </li>


        <li>
            <a href="#clarify" data-bs-toggle="collapse">
                <i data-feather="alert-octagon"></i>
                <span> Clarifies </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="clarify">
                <ul class="nav-second-level">
                    <li>
                        <a href="{{ route('get.clarifies') }}" class="tp-link">Get Clarifies</a>
                    </li>
                </ul>
            </div>
        </li>

        <li>
            <a href="#finance" data-bs-toggle="collapse">
                <i data-feather="alert-octagon"></i>
                <span> Finances Setup</span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="finance">
                <ul class="nav-second-level">
                    <li>
                        <a href="{{ route('get.finances') }}" class="tp-link">Get Finances</a>
                    </li>
                </ul>
            </div>
        </li>

        <li>
            <a href="#Usability" data-bs-toggle="collapse">
                <i data-feather="alert-octagon"></i>
                <span> Usability  Setup</span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="Usability">
                <ul class="nav-second-level">
                    <li>
                        <a href="{{ route('get.usability') }}" class="tp-link">Get Usability</a>
                    </li>
                </ul>
            </div>
        </li>

        <li>
            <a href="#connect" data-bs-toggle="collapse">
                <i data-feather="alert-octagon"></i>
                <span> Connect  Setup</span>
                <span class="menu-arrow"></span>
            </a>

            <div class="collapse" id="connect">
                <ul class="nav-second-level">
                    <li>
                        <a href="{{ route('connects.index') }}" class="tp-link">View Connect</a>
                    </li>
                    <li>
                        <a href="{{ route('connects.create') }}" class="tp-link">Create Connect</a>
                    </li>

                </ul>
            </div>
        </li>
        <li>
            <a href="#answers" data-bs-toggle="collapse">
                <i data-feather="alert-octagon"></i>
                <span> Answer  Setup</span>
                <span class="menu-arrow"></span>
            </a>

            <div class="collapse" id="answers">
                <ul class="nav-second-level">
                    <li>
                        <a href="{{ route('answers.index') }}" class="tp-link">View Answers</a>
                    </li>
                    <li>
                        <a href="{{ route('answers.create') }}" class="tp-link">Create Answer</a>
                    </li>

                </ul>
            </div>
        </li>

        <li class="menu-title mt-2">General</li>

        <li>
            <a href="#teams" data-bs-toggle="collapse">
                <i data-feather="alert-octagon"></i>
                <span> Teams  Setup</span>
                <span class="menu-arrow"></span>
            </a>

            <div class="collapse" id="teams">
                <ul class="nav-second-level">
                    <li>
                        <a href="{{ route('teams.index') }}" class="tp-link">View Teams</a>
                    </li>
                    <li>
                        <a href="{{ route('teams.create') }}" class="tp-link">Create Team</a>
                    </li>

                </ul>
            </div>
        </li>

        <li>
            <a href="#about" data-bs-toggle="collapse">
                <i data-feather="alert-octagon"></i>
                <span> About Page  Setup</span>
                <span class="menu-arrow"></span>
            </a>

            <div class="collapse" id="about">
                <ul class="nav-second-level">
                    <li>
                        <a href="{{ route('get.aboutus') }}" class="tp-link">About</a>
                    </li>
                </ul>
            </div>
        </li>

        <li>
            <a href="#values" data-bs-toggle="collapse">
                <i data-feather="alert-octagon"></i>
                <span> Core Values  Setup</span>
                <span class="menu-arrow"></span>
            </a>

            <div class="collapse" id="values">
                <ul class="nav-second-level">
                    <li>
                        <a href="{{ route('cores.index') }}" class="tp-link">View Core Values</a>
                    </li>
                    <li>
                        <a href="{{ route('cores.create') }}" class="tp-link">Create Core Value</a>
                    </li>

                </ul>
            </div>
        </li>

        <li>
            <a href="#sidebarBaseui" data-bs-toggle="collapse">
                <i data-feather="package"></i>
                <span> Blog Post</span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarBaseui">
                <ul class="nav-second-level">
                    <li>
                        <a href="#blog" data-bs-toggle="collapse">
                            <i data-feather="alert-octagon"></i>
                            <span> Category Setup</span>
                            <span class="menu-arrow"></span>
                        </a>

                        <div class="collapse" id="blog">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('categories.index') }}" class="tp-link">View Categories</a>
                                </li>

                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="#posts" data-bs-toggle="collapse">
                            <i data-feather="alert-octagon"></i>
                            <span> Post Setup</span>
                            <span class="menu-arrow"></span>
                        </a>

                        <div class="collapse" id="posts">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('posts.index') }}" class="tp-link">View Posts</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </li>

        <li>
            <a href="{{ route('contact.index') }}" class="tp-link">
                <i data-feather="aperture"></i>
                <span>Contact Message </span>
            </a>
        </li>

        <li>
            <a href="#sidebarAdvancedUI" data-bs-toggle="collapse">
                <i data-feather="cpu"></i>
                <span>ACL </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarAdvancedUI">
                <ul class="nav-second-level">
                    <li>
                        <a href="{{ route('roles.index') }}" class="tp-link">Roles</a>
                    </li>
                    <li>
                        <a href="{{ route('permissions.index') }}" class="tp-link">Permissions</a>
                    </li>
                    <li>
                        <a href="{{ route('users.index') }}" class="tp-link">Users</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>


</div>
<!-- End Sidebar -->

<div class="clearfix"></div>

</div>
</div>
