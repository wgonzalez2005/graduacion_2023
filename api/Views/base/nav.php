
	    <div class="hide load" >
			<img src="<?php echo constant('RUTA'); ?>public/img/load.gif" alt="loading">
		</div>
		<div class="navbar" id="NAV">
			<div class="container-fluid">

                      <div class="navbar-header">
                        <a href="<?php echo constant('RUTA'); ?>principal">
	                        <img src="<?php echo constant('RUTA'); ?>public/img/logo.png" alt="" class="logo">
	                        <p class="navbar-brand">Reficoop</p>
               	      	</a>


				    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				         <i class="fa fa-bars"></i>
				      </button>
				       </div>
               	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

					<ul class="nav navbar-nav navbar-right">
						<li class="active">

							<a href="<?php echo constant('RUTA'); ?>principal" class="name-user-login"><i class="user icon-nav glyphicon glyphicon-user"></i><?php if (isset($_SESSION['nombre'])) {echo $_SESSION['nombre'];}?></a>
						</li>
						<li>
							<a href="<?php echo constant('RUTA'); ?>cambiarcontrasena">
								<i class="icon-nav fa fa-key" title="Cambiar Contraseña"><span class="hidden-md hidden-lg">Cambiar Contraseña</span></i>
							</a>
						</li>

						<li>
							<a href="<?php echo constant('RUTA'); ?>solicitud">
								<i class="icon-nav fa fa-money" title="Solicitud de Prétamos" aria-hidden="true"><span class="hidden-md hidden-lg">Solicitud Préstamos</span></i>
							</a>
						</li>
						<li>
							<a href="<?php echo constant('RUTA'); ?>calculadora">
								<i class="icon-nav fa fa-calculator" title="Calculadora de Préstamos" aria-hidden="true"><span class="hidden-md hidden-lg">Calculadora Préstamos</span></i>
							</a>
						</li>
						<li>
							<a href="<?php echo constant('RUTA'); ?>informacion">
								<i class="icon-nav fa fa-info-circle" title="Información de Contactos" aria-hidden="true"><span class="hidden-md hidden-lg">Información Contacto</span></i>
							</a>
						</li>
                                                <li><a href="<?php echo constant('RUTA'); ?>public/docs/ESTATUTOS_REFICOOP.pdf" target="_blank"><i class="icon-nav fa fa-file" title="Estatutos de la cooperativa" aria-hidden="true"><span class="hidden-md hidden-lg">Estatutos de la cooperativa</span></i></a></li>
                                                <li><a href="<?php echo constant('RUTA'); ?>public/docs/POLITICA_CREDITO.pdf" target="_blank"><i class="icon-nav fa fa-file-text" title="Política de Crédito" aria-hidden="true"><span class="hidden-md hidden-lg">Política de Crédito</span></i></a></li>

						<li>
							<a href="<?php echo constant('RUTA'); ?>login/cerrarsession">
								<i class="icon-nav fa fa-power-off" title="Cerrar Sessión" aria-hidden="true"><span class="hidden-md hidden-lg">Salir</span></i>
							</a>
						</li>
					</ul>
			 </div>

			</div>
		</div>