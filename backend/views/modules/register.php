
    <main>
        <?php 
            include "left-sidebar.php"; 
        ?>
        <div id="wrapper">
            <aside id="aside" class="aside aside-left" data-fuse-bar="aside" data-fuse-bar-media-step="md" data-fuse-bar-position="left">
                <div class="aside-content bg-primary-700 text-auto">

                    <div class="aside-toolbar">

                        <div class="logo">
                            <span class="logo-icon">F</span>
                            <span class="logo-text">FUSE</span>
                        </div>

                        <button id="toggle-fold-aside-button" type="button" class="btn btn-icon d-none d-lg-block" data-fuse-aside-toggle-fold>
                            <i class="icon icon-backburger"></i>
                        </button>

                    </div>

                    <ul class="nav flex-column custom-scrollbar" id="sidenav" data-children=".nav-item">

                        <li class="subheader">
                            <span>APPS</span>
                        </li>

                        <li class="nav-item" role="tab" id="heading-dashboards">

                            <a class="nav-link ripple with-arrow collapsed" data-toggle="collapse" data-target="#collapse-dashboards" href="#" aria-expanded="false" aria-controls="collapse-dashboards">

                                <i class="icon s-4 icon-tile-four"></i>

                                <span>Dashboards</span>
                            </a>
                            <ul id="collapse-dashboards" class='collapse ' role="tabpanel" aria-labelledby="heading-dashboards" data-children=".nav-item">

                                <li class="nav-item">
                                    <a class="nav-link ripple " href="index.html" data-url="pages-auth-register.html">

                                        <span>Project Dashboard</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link ripple " href="apps-dashboards-server.html" data-url="pages-auth-register.html">

                                        <span>Server</span>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link ripple " href="apps-calendar.html" data-url="pages-auth-register.html">

                                <i class="icon s-4 icon-calendar-today"></i>

                                <span>Calendar</span>
                            </a>
                        </li>

                        <li class="nav-item" role="tab" id="heading-ecommerce">

                            <a class="nav-link ripple with-arrow collapsed" data-toggle="collapse" data-target="#collapse-ecommerce" href="#" aria-expanded="false" aria-controls="collapse-ecommerce">

                                <i class="icon s-4 icon-cart"></i>

                                <span>Ecommerce</span>
                            </a>
                            <ul id="collapse-ecommerce" class='collapse ' role="tabpanel" aria-labelledby="heading-ecommerce" data-children=".nav-item">

                                <li class="nav-item">
                                    <a class="nav-link ripple " href="apps-e-commerce-products.html" data-url="pages-auth-register.html">

                                        <span>Products</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link ripple " href="apps-e-commerce-product.html" data-url="pages-auth-register.html">

                                        <span>Product</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link ripple " href="apps-e-commerce-orders.html" data-url="pages-auth-register.html">

                                        <span>Orders</span>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link ripple " href="apps-mail.html" data-url="pages-auth-register.html">

                                <i class="icon s-4 icon-email"></i>

                                <span>Mail</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link ripple " href="apps-chat.html" data-url="pages-auth-register.html">

                                <i class="icon s-4 icon-hangouts"></i>

                                <span>Chat</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link ripple " href="apps-file-manager.html" data-url="pages-auth-register.html">

                                <i class="icon s-4 icon-folder"></i>

                                <span>File Manager</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link ripple " href="apps-contacts.html" data-url="pages-auth-register.html">

                                <i class="icon s-4 icon-account-box"></i>

                                <span>Contacts</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link ripple " href="apps-todo.html" data-url="pages-auth-register.html">

                                <i class="icon s-4 icon-checkbox-marked"></i>

                                <span>To-Do</span>
                            </a>
                        </li>

                        <li class="subheader">
                            <span>PAGES</span>
                        </li>

                        <li class="nav-item" role="tab" id="heading-authentication">

                            <a class="nav-link ripple with-arrow " data-toggle="collapse" data-target="#collapse-authentication" href="#" aria-expanded="true" aria-controls="collapse-authentication">

                                <i class="icon s-4 icon-lock"></i>

                                <span>Authentication</span>
                            </a>
                            <ul id="collapse-authentication" class='collapse show' role="tabpanel" aria-labelledby="heading-authentication" data-children=".nav-item">

                                <li class="nav-item">
                                    <a class="nav-link ripple " href="pages-auth-login.html" data-url="pages-auth-register.html">

                                        <span>Login</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link ripple " href="pages-auth-login-v2.html" data-url="pages-auth-register.html">

                                        <span>Login v2</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link ripple active" href="pages-auth-register.html" data-url="pages-auth-register.html">

                                        <span>Register</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link ripple " href="pages-auth-register-v2.html" data-url="pages-auth-register.html">

                                        <span>Register v2</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link ripple " href="pages-auth-forgot-password.html" data-url="pages-auth-register.html">

                                        <span>Forgot Password</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link ripple " href="pages-auth-reset-password.html" data-url="pages-auth-register.html">

                                        <span>Reset Password</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link ripple " href="pages-auth-lock-screen.html" data-url="pages-auth-register.html">

                                        <span>Lock Screen</span>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link ripple " href="pages-coming-soon.html" data-url="pages-auth-register.html">

                                <i class="icon s-4 icon-alarm-check"></i>

                                <span>Coming Soon</span>
                            </a>
                        </li>

                        <li class="nav-item" role="tab" id="heading-errors">

                            <a class="nav-link ripple with-arrow collapsed" data-toggle="collapse" data-target="#collapse-errors" href="#" aria-expanded="false" aria-controls="collapse-errors">

                                <i class="icon s-4 icon-alert"></i>

                                <span>Errors</span>
                            </a>
                            <ul id="collapse-errors" class='collapse ' role="tabpanel" aria-labelledby="heading-errors" data-children=".nav-item">

                                <li class="nav-item">
                                    <a class="nav-link ripple " href="pages-errors-404.html" data-url="pages-auth-register.html">

                                        <span>404</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link ripple " href="pages-errors-500.html" data-url="pages-auth-register.html">

                                        <span>500</span>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link ripple " href="pages-maintenance.html" data-url="pages-auth-register.html">

                                <i class="icon s-4 icon-oil"></i>

                                <span>Maintenance</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link ripple " href="pages-profile.html" data-url="pages-auth-register.html">

                                <i class="icon s-4 icon-account"></i>

                                <span>Profile</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link ripple " href="pages-search.html" data-url="pages-auth-register.html">

                                <i class="icon s-4 icon-magnify"></i>

                                <span>Search</span>
                            </a>
                        </li>

                        <li class="subheader">
                            <span>USER INTERFACE</span>
                        </li>

                        <li class="nav-item" role="tab" id="heading-elements">

                            <a class="nav-link ripple with-arrow collapsed" data-toggle="collapse" data-target="#collapse-elements" href="#" aria-expanded="false" aria-controls="collapse-elements">

                                <i class="icon s-4 icon-layers"></i>

                                <span>Elements</span>
                            </a>
                            <ul id="collapse-elements" class='collapse ' role="tabpanel" aria-labelledby="heading-elements" data-children=".nav-item">

                                <li class="nav-item">
                                    <a class="nav-link ripple " href="user-interface-elements-alerts.html" data-url="pages-auth-register.html">

                                        <span>Alerts</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link ripple " href="user-interface-elements-badges.html" data-url="pages-auth-register.html">

                                        <span>Badges</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link ripple " href="user-interface-elements-breadcrumb.html" data-url="pages-auth-register.html">

                                        <span>Breadcrumb</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link ripple " href="user-interface-elements-buttons.html" data-url="pages-auth-register.html">

                                        <span>Buttons</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link ripple " href="user-interface-elements-button-group.html" data-url="pages-auth-register.html">

                                        <span>Button Group</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link ripple " href="user-interface-elements-cards.html" data-url="pages-auth-register.html">

                                        <span>Cards</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link ripple " href="user-interface-elements-dropdowns.html" data-url="pages-auth-register.html">

                                        <span>Dropdowns</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link ripple " href="user-interface-elements-forms.html" data-url="pages-auth-register.html">

                                        <span>Forms</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link ripple " href="user-interface-elements-input-group.html" data-url="pages-auth-register.html">

                                        <span>Input Group</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link ripple " href="user-interface-elements-jumbotron.html" data-url="pages-auth-register.html">

                                        <span>Jumbotron</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link ripple " href="user-interface-elements-list-group.html" data-url="pages-auth-register.html">

                                        <span>List Group</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link ripple " href="user-interface-elements-navs.html" data-url="pages-auth-register.html">

                                        <span>Navs</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link ripple " href="user-interface-elements-navbar.html" data-url="pages-auth-register.html">

                                        <span>Navbar</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link ripple " href="user-interface-elements-pagination.html" data-url="pages-auth-register.html">

                                        <span>Pagination</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link ripple " href="user-interface-elements-progress.html" data-url="pages-auth-register.html">

                                        <span>Progress</span>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item" role="tab" id="heading-tables">

                            <a class="nav-link ripple with-arrow collapsed" data-toggle="collapse" data-target="#collapse-tables" href="#" aria-expanded="false" aria-controls="collapse-tables">

                                <i class="icon s-4 icon-table-large"></i>

                                <span>Tables</span>
                            </a>
                            <ul id="collapse-tables" class='collapse ' role="tabpanel" aria-labelledby="heading-tables" data-children=".nav-item">

                                <li class="nav-item">
                                    <a class="nav-link ripple " href="user-interface-tables-simple-table.html" data-url="pages-auth-register.html">

                                        <span>Simple Table</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link ripple " href="user-interface-tables-data-table.html" data-url="pages-auth-register.html">

                                        <span>Data Table</span>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item" role="tab" id="heading-page-layouts">

                            <a class="nav-link ripple with-arrow collapsed" data-toggle="collapse" data-target="#collapse-page-layouts" href="#" aria-expanded="false" aria-controls="collapse-page-layouts">

                                <i class="icon s-4 icon-view-quilt"></i>

                                <span>Page Layouts</span>
                            </a>
                            <ul id="collapse-page-layouts" class='collapse ' role="tabpanel" aria-labelledby="heading-page-layouts" data-children=".nav-item">

                                <li class="nav-item" role="tab" id="heading-carded">

                                    <a class="nav-link ripple with-arrow collapsed" data-toggle="collapse" data-target="#collapse-carded" href="#" aria-expanded="false" aria-controls="collapse-carded">

                                        <span>Carded</span>
                                    </a>
                                    <ul id="collapse-carded" class='collapse ' role="tabpanel" aria-labelledby="heading-carded" data-children=".nav-item">

                                        <li class="nav-item">
                                            <a class="nav-link ripple " href="user-interface-page-layouts-carded-full-width.html" data-url="pages-auth-register.html">

                                                <span>Full Width</span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link ripple " href="user-interface-page-layouts-carded-full-width-2.html" data-url="pages-auth-register.html">

                                                <span>Full Width 2</span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link ripple " href="user-interface-page-layouts-carded-left-sidebar.html" data-url="pages-auth-register.html">

                                                <span>Left Sidebar</span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link ripple " href="user-interface-page-layouts-carded-left-sidebar-2.html" data-url="pages-auth-register.html">

                                                <span>Left Sidebar 2</span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link ripple " href="user-interface-page-layouts-carded-right-sidebar.html" data-url="pages-auth-register.html">

                                                <span>Right Sidebar</span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link ripple " href="user-interface-page-layouts-carded-right-sidebar-2.html" data-url="pages-auth-register.html">

                                                <span>Right Sidebar 2</span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="nav-item" role="tab" id="heading-simple">

                                    <a class="nav-link ripple with-arrow collapsed" data-toggle="collapse" data-target="#collapse-simple" href="#" aria-expanded="false" aria-controls="collapse-simple">

                                        <span>Simple</span>
                                    </a>
                                    <ul id="collapse-simple" class='collapse ' role="tabpanel" aria-labelledby="heading-simple" data-children=".nav-item">

                                        <li class="nav-item">
                                            <a class="nav-link ripple " href="user-interface-page-layouts-simple-full-width.html" data-url="pages-auth-register.html">

                                                <span>Full Width</span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link ripple " href="user-interface-page-layouts-simple-left-sidebar.html" data-url="pages-auth-register.html">

                                                <span>Left Sidebar</span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link ripple " href="user-interface-page-layouts-simple-left-sidebar-2.html" data-url="pages-auth-register.html">

                                                <span>Left Sidebar 2</span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link ripple " href="user-interface-page-layouts-simple-left-sidebar-inner.html" data-url="pages-auth-register.html">

                                                <span>Left Sidebar Inner</span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link ripple " href="user-interface-page-layouts-simple-left-sidebar-floating.html" data-url="pages-auth-register.html">

                                                <span>Left Sidebar Floating</span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link ripple " href="user-interface-page-layouts-simple-right-sidebar.html" data-url="pages-auth-register.html">

                                                <span>Right Sidebar</span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link ripple " href="user-interface-page-layouts-simple-right-sidebar-2.html" data-url="pages-auth-register.html">

                                                <span>Right Sidebar 2</span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link ripple " href="user-interface-page-layouts-simple-right-sidebar-inner.html" data-url="pages-auth-register.html">

                                                <span>Right Sidebar Inner</span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link ripple " href="user-interface-page-layouts-simple-right-sidebar-floating.html" data-url="pages-auth-register.html">

                                                <span>Right Sidebar Floating</span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link ripple " href="user-interface-page-layouts-simple-tabbed.html" data-url="pages-auth-register.html">

                                                <span>Tabbed</span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link ripple " href="user-interface-page-layouts-blank.html" data-url="pages-auth-register.html">

                                        <span>Blank</span>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link ripple " href="user-interface-typography.html" data-url="pages-auth-register.html">

                                <i class="icon s-4 icon-format-text"></i>

                                <span>Typography</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link ripple " href="user-interface-icons.html" data-url="pages-auth-register.html">

                                <i class="icon s-4 icon-information"></i>

                                <span>Icons</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link ripple " href="user-interface-colors.html" data-url="pages-auth-register.html">

                                <i class="icon s-4 icon-palette"></i>

                                <span>Colors</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link ripple " href="user-interface-helper-classes.html" data-url="pages-auth-register.html">

                                <i class="icon s-4 icon-help-circle"></i>

                                <span>Helper Classes</span>
                            </a>
                        </li>

                        <li class="subheader">
                            <span>COMPONENTS</span>
                        </li>

                        <li class="nav-item" role="tab" id="heading-charts">

                            <a class="nav-link ripple with-arrow collapsed" data-toggle="collapse" data-target="#collapse-charts" href="#" aria-expanded="false" aria-controls="collapse-charts">

                                <i class="icon s-4 icon-poll"></i>

                                <span>Charts</span>
                            </a>
                            <ul id="collapse-charts" class='collapse ' role="tabpanel" aria-labelledby="heading-charts" data-children=".nav-item">

                                <li class="nav-item">
                                    <a class="nav-link ripple " href="components-charts-nvd3.html" data-url="pages-auth-register.html">

                                        <span>nvD3</span>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link ripple " href="components-collapse.html" data-url="pages-auth-register.html">

                                <i class="icon s-4 icon-plus-box"></i>

                                <span>Collapse</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link ripple " href="components-modal.html" data-url="pages-auth-register.html">

                                <i class="icon s-4 icon-window-maximize"></i>

                                <span>Modal</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link ripple " href="components-popovers.html" data-url="pages-auth-register.html">

                                <i class="icon s-4 icon-tooltip-outline"></i>

                                <span>Popovers</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link ripple " href="components-snackbar.html" data-url="pages-auth-register.html">

                                <i class="icon s-4 icon-page-layout-footer"></i>

                                <span>Snackbar</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link ripple " href="components-tooltips.html" data-url="pages-auth-register.html">

                                <i class="icon s-4 icon-tooltip"></i>

                                <span>Tooltips</span>
                            </a>
                        </li>

                    </ul>
                </div>

            </aside>
            <div class="content-wrapper">
                <div class="content custom-scrollbar">

                    <div id="register" class="p-8">

                        <div class="form-wrapper md-elevation-8 p-8">

                            <div class="logo bg-secondary">
                                <span>F</span>
                            </div>

                            <div class="title mt-4 mb-8">Create an account</div>

                            <form name="registerForm" novalidate>

                                <div class="form-group mb-4">
                                    <input type="text" class="form-control" id="registerFormInputName" aria-describedby="nameHelp" />
                                    <label for="registerFormInputName">Name</label>
                                </div>

                                <div class="form-group mb-4">
                                    <input type="email" class="form-control" id="registerFormInputEmail" aria-describedby="emailHelp" />
                                    <label for="registerFormInputEmail">Email address</label>
                                </div>

                                <div class="form-group mb-4">
                                    <input type="password" class="form-control" id="registerFormInputPassword" />
                                    <label for="registerFormInputPassword">Password</label>
                                </div>

                                <div class="form-group mb-4">
                                    <input type="password" class="form-control" id="registerFormInputPasswordConfirm" />
                                    <label for="registerFormInputPasswordConfirm">Password (Confirm)</label>
                                </div>

                                <div class="terms-conditions row align-items-center justify-content-center pt-4 mb-8">
                                    <div class="form-check mr-1 mb-1">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" aria-label="Remember Me" />
                                            <span class="checkbox-icon"></span>
                                            <span>I read and accept</span>
                                        </label>
                                    </div>
                                    <a href="#" class="text-secondary mb-1">terms and conditions</a>
                                </div>

                                <button type="submit" class="submit-button btn btn-block btn-secondary my-4 mx-auto" aria-label="LOG IN">
                                    CREATE MY ACCOUNT
                                </button>

                            </form>

                            <div class="login d-flex flex-column flex-sm-row align-items-center justify-content-center mt-8 mb-6 mx-auto">
                                <span class="text mr-sm-2">Already have an account?</span>
                                <a class="link text-secondary" href="pages-auth-login.html">Log in</a>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </main>