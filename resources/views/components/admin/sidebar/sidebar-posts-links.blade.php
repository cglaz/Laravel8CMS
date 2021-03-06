            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Posts</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item" href="{{route('admin.create.post')}}">Create Post</a>
                        <a class="collapse-item" href="{{route('admin.view.posts')}}">View All Posts</a>
                    </div>
                </div>
            </li>

            @if(auth()->user()->userHasRole('Admin'))
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('admin.create.page')}}">Create Page</a>
                        <a class="collapse-item" href="{{route('admin.view.pages')}}">View All Pages</a>
                    </div>
                </div>
            </li>
            @endif

            @if(auth()->user()->userHasRole('Admin'))
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers"
                    aria-expanded="true" aria-controls="collapseUsers">
                    <i class="fas fa-user"></i>
                    <span>Users</span>
                </a>
                <div id="collapseUsers" class="collapse" aria-labelledby="headingUsers"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('admin.view.users')}}">View All User</a>
                    </div>
                </div>
            </li>
            @endif

            @if(auth()->user()->userHasRole('Admin'))
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAuthorization"
                    aria-expanded="true" aria-controls="collapseAuthorization">
                    <i class="fas fa-user"></i>
                    <span>Authorization</span>
                </a>
                <div id="collapseAuthorization" class="collapse" aria-labelledby="headingAuthorization"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('admin.view.roles')}}">Roles</a>
                        <a class="collapse-item" href="{{route('admin.view.permissions')}}">Permissions</a>
                    </div>
                </div>
            </li>
            @endif

            @if(auth()->user())
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProfile"
                    aria-expanded="true" aria-controls="collapseProfile">
                    <i class="fas fa-user"></i>
                    <span>Profile</span>
                </a>
                <div id="collapseProfile" class="collapse" aria-labelledby="headingProfilen"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('admin.show.user', auth()->user())}}">Edit profile</a>

                    </div>
                </div>
            </li>
            @endif
