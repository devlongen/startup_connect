<div class="container-fluid position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
        <a href="" class="navbar-brand p-0">
            <h1 class="m-0"><i class="fa fa-user-tie me-2"></i>Startup Connect</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
            <li class="nav-item dropdown hidden-caret">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                    <div class="avatar-sm">
                        <img src="../dist/img/User-Profile-PNG-Download-Image-1508492577.png" alt="..." class="avatar-img rounded-circle">
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                        <li>
                            <div class="user-box">
                                <div><img src="../dist/img/User-Profile-PNG-Download-Image-1508492577.png" alt="image profile" class="avatar-img rounded"></div>
                                <div class="u-text">
                                    <h4><?php echo $_SESSION['usuario']['nome']?></h4>
                                    <p class="text-muted"><?php echo $_SESSION['usuario']['email']?></p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="">Meu perfil</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="">Configurações da conta</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../app/plugins_login/backend/function/logout.php">Logout</a>
                        </li>
                    </div>
                </ul>
            </li>
                <a href="" class="nav-item nav-link active">Home</a>
                <a href="plugins_projeto/projeto.php" class="nav-item nav-link">Projetos</a>
                <a href="plugins_login/tela_login.php" class="nav-item nav-link">Login</a>

                <div class="nav-item dropdown">

                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Serviços</a>
                    <div class="dropdown-menu m-0">
                        <a href="plugins_empresa/cadastro_empresa.php" class="dropdown-item">Criar Startup</a>
                        <a href="plugins_projeto/projeto.php" class="dropdown-item">Quero investir</a>
                    </div>
                </div>



        </div>
    </nav>

    <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="dist/img/carousel-1.jpg" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                        <h5 class="text-white text-uppercase mb-3 animated slideInDown">Você pode começar Agora</h5>
                        <h1 class="display-1 text-white mb-md-4 animated zoomIn">Invista em negócios Promissores</h1>
                        <a href="plugins_empresa/cadastro_empresa.php" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Criar Startup</a>
                        <a href="plugins_projeto/projeto.php" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Quero investir</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="dist/img/carousel-2.jpg" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                        <h5 class="text-white text-uppercase mb-3 animated slideInDown">Criação e Inovação</h5>
                        <h1 class="display-1 text-white mb-md-4 animated zoomIn">Conectando sua startup com investidores</h1>
                        <a href="quote.html" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Criar Startup</a>
                        <a href="" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Quero investir</a>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>