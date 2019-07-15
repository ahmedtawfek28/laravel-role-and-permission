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
                    <a class="waves-effect waves-dark" href="{{ route('Admin.home') }}" aria-expanded="false"><i
                            class="icon-Car-Wheel">
                        </i><span class="hide-menu">
                                     Dashboard

                        </span></a>
                </li>
                @can('main-userManagement')
                    <li class="nav-small-cap">--- User Management</li>
                    @can('permissioncategory-list')
                        <li><a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                                    class=" icon-Lock-2"></i><span class="hide-menu">Permissioncategory</span></a>
                            <ul aria-expanded="false" class="collapse">
                                @can('permissioncategory-create')
                                    <li>{!! Html::linkRoute('Admin.permissioncategories.create','Add Permissioncategory') !!}</li>
                                @endcan
                                <li>{!! Html::linkRoute('Admin.permissioncategories.index','Permissioncategories') !!}</li>
                            </ul>
                        </li>
                    @endcan
                    @can('permission-list')
                        <li><a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                                    class=" icon-Lock-2"></i><span class="hide-menu">Permission</span></a>
                            <ul aria-expanded="false" class="collapse">
                                @can('permission-create')
                                    <li>{!! Html::linkRoute('Admin.permissions.create','Add Permission') !!}</li>
                                @endcan
                                <li>{!! Html::linkRoute('Admin.permissions.index','Permissions') !!}</li>
                            </ul>
                        </li>
                    @endcan
                    @can('role-list')

                        <li><a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                                    class="icon-Lock-User"></i><span class="hide-menu">Role</span></a>
                            <ul aria-expanded="false" class="collapse">
                                @can('role-create')
                                    <li>{!! Html::linkRoute('Admin.roles.create','Add Role') !!}</li>
                                @endcan
                                <li>{!! Html::linkRoute('Admin.roles.index','Roles') !!}</li>
                            </ul>
                        </li>
                    @endcan
                    @can('user-create')

                        <li><a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                                    class=" icon-Administrator"></i><span class="hide-menu">User</span></a>
                            <ul aria-expanded="false" class="collapse">
                                @can('user-create')
                                    <li>{!! Html::linkRoute('Admin.users.create','Add User') !!}</li>
                                @endcan
                                <li>{!! Html::linkRoute('Admin.users.index','Users') !!}</li>
                            </ul>
                        </li>
                    @endcan
                @endcan
                @can('main-dataManagement')
                    <li class="nav-small-cap">--- Data Management</li>
                    @can('category-list')
                        <li><a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                                    class=" icon-Folder-Organizing"></i><span class="hide-menu">Category</span></a>
                            <ul aria-expanded="false" class="collapse">
                                @can('category-create')

                                    <li>{!! Html::linkRoute('Admin.category.create','Add Category') !!}</li>
                                @endcan
                                <li>{!! Html::linkRoute('Admin.category.index','Category') !!}</li>
                            </ul>
                        </li>
                    @endcan
                    @can('subcategory-list')
                        <li><a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                                    class="icon-Folder-Open"></i><span class="hide-menu">SubCategory</span></a>
                            <ul aria-expanded="false" class="collapse">
                                @can('subcategory-create')

                                    <li>{!! Html::linkRoute('Admin.subcategory.create','Add SubCategory') !!}</li>
                                @endcan
                                <li>{!! Html::linkRoute('Admin.subcategory.index','SubCategory') !!}</li>
                            </ul>
                        </li>
                    @endcan
                @endcan

                <li class="nav-small-cap">--- Logout</li>
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('admin.logout') }}" aria-expanded="false" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">

                        <i class="mdi mdi-logout">
                        </i><span class="hide-menu">
                                     Logout

                        </span></a>
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
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
