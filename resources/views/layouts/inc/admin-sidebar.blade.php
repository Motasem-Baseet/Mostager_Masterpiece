<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu" >
                        <div class="nav" >
                            <div class="sb-sidenav-menu-heading" style="color:#D3F1DF;">Main Page</div>
                            <a class="nav-link" href="{{url('admin/dashboard')}}">
                                <div class="sb-nav-link-icon" style="color:#D3F1DF;"><i class="fas fa-tachometer-alt" style="color:#D3F1DF;"></i></div>
                                Dashboard
                            </a>

                            <div class="sb-sidenav-menu-heading" style="color:#D3F1DF;">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts" style="color:#D3F1DF;">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Category
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down" style="color:#D3F1DF;"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a style="color:#D3F1DF;" class="nav-link" href="{{ url('admin/add-category') }}">Add category</a>
                                    <a style="color:#D3F1DF;" class="nav-link" href="{{ url('admin/category') }}">View Category</a>
                                </nav>
                            </div>


                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseProducts" aria-expanded="false" aria-controls="collapseProducts" style="color:#D3F1DF;">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-briefcase"></i></div>
                                Products
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down" style="color:#D3F1DF;"></i></div>
                            </a>
                            <div class="collapse" id="collapseProducts" aria-labelledby="headingFour" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a style="color:#D3F1DF;" class="nav-link" href="{{ url('admin/add-products') }}">Add Product</a>
                                    <a style="color:#D3F1DF;" class="nav-link" href="{{ url('admin/products') }}">View Product</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseRental" aria-expanded="false" aria-controls="collapseRental" style="color:#D3F1DF;">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-handshake-simple"></i></div>
                                Rentals
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down" style="color:#D3F1DF;"></i></div>
                            </a>
                            <div class="collapse" id="collapseRental" aria-labelledby="headingFive" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a style="color:#D3F1DF;" class="nav-link" href="{{ url('admin/rentals') }}">View Rentals</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUsers" aria-expanded="false" aria-controls="collapseUsers" style="color:#D3F1DF;">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                                Users
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down" style="color:#D3F1DF;"></i></div>
                            </a>
                            <div class="collapse" id="collapseUsers" aria-labelledby="headingThree" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a style="color:#D3F1DF;" class="nav-link" href="{{ url('admin/users') }}">View Users</a>
                                </nav>
                            </div>

                            <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a> -->
                                    <!-- <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div> -->

                                    <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a> -->
                        </div>
                    </div>
                    <!-- <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div> -->
                </nav>
            </div>

            <style>
                .sb-sidenav{
                    background-color:#85A98F;
                }

                #layoutSidenav_nav .sb-sidenav .sb-sidenav-menu .nav .sb-sidenav-menu-heading   {
background-color:balck;
                }


            </style>
