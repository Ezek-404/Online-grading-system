               <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow" style="background-color: #1146A6;">

               <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100">
                        <div class="logo">
                            <div class="simple-text logo-normal text-white text-uppercase">
                            <h4>Hello <?php echo $_SESSION['username'] ?></h4>
                            </div>
                        </div>
            </div>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-cog fa-1x text-warning"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="edit_profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-primary"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-primary"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>

 
 
