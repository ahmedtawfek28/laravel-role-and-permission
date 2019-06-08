<!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">--- PERSONAL</li>
                        <li>
                             <a class="waves-effect waves-dark" href="{{ route('home') }}" aria-expanded="false"><i class="icon-Car-Wheel">
                                 </i><span class="hide-menu">
                                     Dashboard
                                      
                            </a>
                        </li>
                        @can('main-userManagement')
                        <li class="nav-small-cap">--- User Management </li>
                        @can('permissioncategory-list')<li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class=" icon-Lock-2"></i><span class="hide-menu">Permissioncategory</span></a>
                            <ul aria-expanded="false" class="collapse">
                                    @can('permissioncategory-create')
                                    <li>{!! Html::linkRoute('permissioncategories.create','Add Permissioncategory') !!}</li>
                                    @endcan
                                <li>{!! Html::linkRoute('permissioncategories.index','Permissioncategories') !!}</li>
                            </ul>
                        </li>
                        @endcan
                        @can('permission-list')<li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class=" icon-Lock-2"></i><span class="hide-menu">Permission</span></a>
                            <ul aria-expanded="false" class="collapse">
                                    @can('permission-create')
                                    <li>{!! Html::linkRoute('permissions.create','Add Permission') !!}</li>
                                    @endcan
                                <li>{!! Html::linkRoute('permissions.index','Permissions') !!}</li>
                            </ul>
                        </li>
                        @endcan
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="icon-Lock-User"></i><span class="hide-menu">Role</span></a>
                            <ul aria-expanded="false" class="collapse">
                                    <li>{!! Html::linkRoute('roles.create','Add Role') !!}</li>
                                    <li>{!! Html::linkRoute('roles.index','Roles') !!}</li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class=" icon-Administrator"></i><span class="hide-menu">User</span></a>
                            <ul aria-expanded="false" class="collapse">
                                    <li>{!! Html::linkRoute('users.create','Add User') !!}</li>
                                    <li>{!! Html::linkRoute('users.index','Users') !!}</li>
                            </ul>
                        </li>
                        @endcan
                        <li class="nav-small-cap">--- Logout</li>
                        <li>
                             <a class="waves-effect waves-dark" href="{{ route('logout') }}" aria-expanded="false" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                
                <i class="mdi mdi-logout">
                                 </i><span class="hide-menu">
                                     Logout
                                      
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form> 
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
