<div class="nav" id="navbar">
    <nav class="nav__container">
        <div>
            <a href="{{url('/admin')}}" class="nav__link nav__logo">
                <i class='bx bxs-disc nav__icon' ></i>
                <span class="nav__logo-name">EliteSI</span>
            </a>
            <div class="nav__list">
                <div class="nav__items">
                    <a href="{{url('/admin')}}" class="nav__link active">
                        <i class='bx bx-home nav__icon' ></i>
                        <span class="nav__name">Home</span>
                    </a>
                </div>
                @can('projet_access')
                <div class="nav__items">
                    <h3 class="nav__subtitle">Projects</h3>
                    @can('client_access')
                    <div class="nav__dropdown">
                        <div class="nav__link">
                            <i class='bx bx-group nav__icon' ></i>
                            <span class="nav__name">Clients</span>
                            <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                        </div>
                        <div class="nav__dropdown-collapse">
                            <div class="nav__dropdown-content">
                                <div class="{{ request()->is('admin/clients') || request()->is('admin/clients/*') ? 'active' : '' }}">
                                    <a href="{{ route("admin.clients.index") }}" class="nav__dropdown-item">Liste des clients</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endcan
                    @can('project_access')
                    <div class="nav__dropdown">
                        <div class="nav__link">
                            <i class='bx bx-folder-plus nav__icon' ></i>
                            <span class="nav__name">Projets</span>
                            <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                        </div>
                        <div class="nav__dropdown-collapse">
                            <div class="nav__dropdown-content">
                                <div class="{{ request()->is('admin/projects') || request()->is('admin/projects/*') ? 'active' : '' }}">
                                    <a href="{{ route("admin.projects.index") }}" class="nav__dropdown-item">Liste des projets</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endcan
                </div>
                @endcan
                @can('user_management_access')
                <div class="nav__items">
                    <h3 class="nav__subtitle">STAFF</h3>
                    <div class="nav__dropdown">
                        <div class="nav__link">
                            <i class='bx bx-group nav__icon' ></i>
                            <span class="nav__name">Management</span>
                            <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                        </div>
                        <div class="nav__dropdown-collapse">
                            <div class="nav__dropdown-content">
                                @can('permission_access')
                                <div class="{{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav__dropdown-item">Liste des permisson</a>
                                </div>
                                @endcan
                                @can('role_access')
                                <div class="{{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                    <a href="{{ route("admin.roles.index") }}" class="nav__dropdown-item">Liste des roles</a>
                                </div>
                                @endcan
                                @can('user_access')
                                <div class="{{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                    <a href="{{ route("admin.users.index") }}" class="nav__dropdown-item">Liste des utilisateurs</a>
                                </div>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
                @endcan
                @can('tache_access')
                <div class="nav__items">
                    <h3 class="nav__subtitle">Tasks</h3>
                    @can('task_access')
                    <div class="nav__dropdown">
                        <div class="nav__link">
                            <i class='bx bx-task nav__icon' ></i>
                            <span class="nav__name">Taches</span>
                            <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                        </div>
                        <div class="nav__dropdown-collapse">
                            <div class="nav__dropdown-content">
                                <div class="{{ request()->is('admin/tasks') || request()->is('admin/tasks/*') ? 'active' : '' }}">
                                    <a href="{{ route("admin.tasks.index") }}" class="nav__dropdown-item">Liste des taches</a>
                                </div>
                            </div>
                        </div> 
                    </div>
                    @endcan
                    @can('reminder_access')
                    <div class="nav__dropdown">
                        <div href="#" class="nav__link">
                            <i class='bx bx-bell nav__icon' ></i>
                            <span class="nav__name">Reminders</span>
                            <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                        </div>
                        <div class="nav__dropdown-collapse">
                            <div class="nav__dropdown-content">
                                <div class="{{ request()->is('admin/reminders') || request()->is('admin/reminders/*') ? 'active' : '' }}">
                                    <a href="{{ route("admin.reminders.index") }}" class="nav__dropdown-item">Liste des reminders</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endcan
                </div>
                @endcan
                @can('sage_access')
                <div class="nav__items">
                    <h3 class="nav__subtitle">SAGE</h3>
                    @can('licence_access')
                    <div class="nav__dropdown">
                        <div class="nav__link">
                            <i class='bx bx-book-bookmark nav__icon' ></i>
                            <span class="nav__name">Licences</span>
                            <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                        </div>      
                        <div class="nav__dropdown-collapse">
                            <div class="nav__dropdown-content">
                                <div class="{{ request()->is('admin/licences') || request()->is('admin/licences/*') ? 'active' : '' }}">
                                    <a href="{{ route("admin.licences.index") }}" class="nav__dropdown-item">Liste des licences</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endcan
                </div>
                @endcan
            </div>
        </div>
        <a class="nav__link nav__logout" href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
            <i class="fas fa-fw fa-sign-out-alt">

            </i>
            {{ trans('global.logout') }}
        </a>
        
    </nav>
</div>