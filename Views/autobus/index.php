<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Graduación Infortep 2022</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="<?php echo RUTA; ?>public/css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="<?php echo RUTA; ?>public/css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="<?php echo RUTA; ?>public/css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="<?php echo RUTA; ?>public/images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="<?php echo RUTA; ?>public/css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="<?php echo RUTA; ?>public/images/loading.gif" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <header>
        <!-- header inner -->
        <div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <!-- <div class="logo">
                              <a href="index.html"><img src="<?php echo RUTA; ?>public/images/logo.png" alt="#" /></a>
                           </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                        <nav class="navigation navbar navbar-expand-md navbar-dark ">
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarsExample04">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="inicio"> Inicio </a>
                                    </li>
                                    
                                    <!-- <li class="nav-item">
                                        <a class="nav-link" href="ocupacion">Ocupación </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="familia">Familia</a>
                                    </li> -->

                                    <li class="nav-item">
                                        <a class="nav-link" href="autobus">Autobus</a>
                                    </li>
                                                                     
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- end header inner -->
    <!-- end header -->
    <!-- banner -->
    <!-- end banner -->
    <!-- three_box -->
    <!-- three_box -->
    <!-- hottest -->
    <div class="hottest">
        <div class="container-fluid">
            <div class="row d_flex">
                <div class="col-md-5">
                   
                    <div class="container-fluid contenedor-tabla">
                    <h1 class="text-center" style="background-color:#13110e ;color:white;padding:10px;">Graduandos por Autobus</h1>
                    <table class="table  table-striped">
                        <thead class="header-table">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">DESCRIPCION</th> 
                                <th scope="col">COORDINADOR</th>                 
                                <th class="text-center" scope="col">TELEFONO</th>
                                <th class="text-center" scope="col">LOCALIDAD</th>      
                                <th class="text-center" scope="col">TOTAL</th>                           
                                <th class="text-center" scope="col">VER</th>
                            </tr>
                        </thead>
                        <tbody id="datosautobus">
                          
                        </tbody>
                    </table>
                    </div>
                </div>
                <div class="col-md-7">
                   
                   <div class="container-fluid contenedor-tabla">
                   <h1 class="text-center" style="background-color:#13110e ;color:white;padding:10px;">Listado Graduandos por Autobus</h1>
                   <table class="table  table-striped">
                       <thead class="header-table">
                           <tr>
                               <th scope="col">ID</th>
                               <th scope="col">NOMBRE</th>
                               <th scope="col">OCUPACION</th>
                               <th scope="col">FAMILIA</th>    
                               <th scope="col">COORDINADOR</th>    
                               <th scope="col">LOCALIDAD</th>                                                    
                               <th class="text-center" scope="col">ENTREGADO</th>
                               <th class="text-center" scope="col">OP</th>
                           </tr>
                       </thead>
                       <tbody id="datosgraduandos">
                         
                       </tbody>
                   </table>

               
                   </div>
               </div>
            </div>
            <h1 class="text-right" id="cantidad">Cantidad: 0 </h1>
        </div>
    </div>
    </div>
    </div>
    </div>
    <!-- end about -->
    </div>
    <!--  footer -->
    <footer id="contact">
        <div class="footer">
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <p>Copyright 2022 All Right Reserved By <a href="https://infortep.gob.do/"> INFOTEP</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="modal" tabindex="-1" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header" style="background-color: #f4cb1e;">
                <h5 style="color:white!important;"  class="modal-title">AVISO DEL SISTEMA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="">
                    <tr>                    
                        <td><b>Número:</b></td>
                        <td id="titulo">12555</td>
                    </tr>
                    <tr>                    
                        <td><b>Nombre:</b></td>
                        <td id="nomb">Jose Augusto Perez</td>
                    </tr>
                    <tr>                    
                        <td><b>Ocupacion:</b></td>
                        <td id="ocupacion">Electronica Industrial</td>
                    </tr>
                    <tr>                    
                        <td><b>Familia:</b></td>
                        <td id="familia">Itinerario</td>
                    </tr>
                    <tr>                    
                        <td><b>Estado:</b></td>
                        <td id="estado">Presente</td>
                    </tr>
                    
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                
            </div>
            </div>
        </div>
</div>
    <!-- end footer -->
    <!-- Javascript files-->
    <script src="<?php echo RUTA; ?>public/js/jquery.min.js"></script>
    <script src="<?php echo RUTA; ?>public/js/popper.min.js"></script>
    <script src="<?php echo RUTA; ?>public/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo RUTA; ?>public/js/jquery-3.0.0.min.js"></script>
    <!-- sidebar -->
    <script src="<?php echo RUTA; ?>public/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?php echo RUTA; ?>public/js/custom.js"></script>
    <script src="<?php echo RUTA; ?>public/app/autobus.js"></script>
</body>

</html>