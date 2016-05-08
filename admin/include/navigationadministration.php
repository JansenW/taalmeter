        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dashboard.php">Taalmeter</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="dashboard.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-group fa-fw"></i> Cursisten<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="studentlist.php">cursisten lijst</a>
                                </li>
                                <li>
                                    <a href="studentadd.php">cursisten aanmaken</a>
                                </li>
                                <li>
                                  <a href="studentfile.php">cursisten opladen</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-graduation-cap fa-fw"></i> Evaluaties<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="evaluationlist.php">Evaluatie lijst</a>
                                </li>
                                <li>
                                    <a href="evaluationadd.php">Evaluatie toevoegen</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-table fa-fw"></i> Klassen<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="klaslist.php">klas lijst</a>
                                </li>
                                <li>
                                    <a href="klasadd.php">klas aanmaken</a>
                                </li>
                                <li>
                                  <a href="klasfile.php">klassen opladen</a>
                                </li>
                                <li>
                                  <a href="studentklasfile.php">studenten in klas opladen</a>
                                </li>
                            </ul>
                        </li>
                        <li class="active">
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Administratie<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                              <li>
                                <a href="#">Code leerkracht <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                  <li>
                                    <a href="codelklist.php">Code leerkracht lijst</a>
                                  </li>
                                  <li>
                                    <a href="codelkadd.php">Code leerkracht aanmaken</a>
                                  </li>
                                </ul>
                              </li>
                              <li>
                                <a href="#">Leerplan doelstelling <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                  <li>
                                    <a href="goallist.php">Leerplan doelstelling lijst</a>
                                  </li>
                                  <li>
                                    <a href="goaladd.php">Leerplan doelstelling aanmaken</a>
                                  </li>
                                </ul>
                              </li>
                              <li>
                                <a href="#">Niveau <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                  <li>
                                    <a href="levellist.php">Niveau lijst</a>
                                  </li>
                                  <li>
                                    <a href="leveladd.php">Niveau aanmaken</a>
                                  </li>
                                </ul>
                              </li>
                              <li>
                                <a href="#">Teksten <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                  <li>
                                    <a href="tekstenlist.php">Teksten lijst</a>
                                  </li>
                                  <li>
                                    <a href="tekstenadd.php">Teksten aanmaken</a>
                                  </li>
                                </ul>
                              </li>
                              <li>
                                <a href="#">Werkvormen <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                  <li>
                                    <a href="werkvormlist.php">Werkvormen lijst</a>
                                  </li>
                                  <li>
                                    <a href="werkvormadd.php">Werkvormen aanmaken</a>
                                  </li>
                                </ul>
                              </li>
                              <li>
                                <a href="#">Gebruikers <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                  <li>
                                    <a href="userlist.php">Gebruikers lijst</a>
                                  </li>
                                  <li>
                                    <a href="useradd.php">Gebruiker aanmaken</a>
                                  </li>
                                </ul>
                              </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>