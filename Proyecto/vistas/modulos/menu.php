<aside class="main-sidebar">

	<section class="sidebar">

		<ul class="sidebar-menu">

		
		<?php
 if ($_SESSION["id_rol"] == 1) {
	echo '	<li>

				<a href="usuarios">

					<i class="fa fa-user"></i>
					<span>Usuarios</span>

				</a>

			</li>

			';
		}





		if ($_SESSION["id_rol"] == 1)  {
			echo '<li>



				<a href="categorias">

					<i class="fa fa-th"></i>
					<span>Categorías</span>

				</a>

			</li>';
		}








			
		if ($_SESSION["id_rol"] == 1 || $_SESSION["id_rol"] == 3)  {
			echo '<li>

				<a href="carreras">

					<i class="fa fa-product-hunt"></i>
					<span>Carreras</span>

				</a>

			</li>';
		}







		if ($_SESSION["id_rol"] == 1) {
			echo '<li>

				<a href="productos">

					<i class="fa fa-product-hunt"></i>
					<span>Productos</span>

				</a>

			</li>';
		}





		if ($_SESSION["id_rol"] == 1 || $_SESSION["id_rol"] == 3)  {
			echo '<li>

			<li>

				<a href="alumnos">

					<i class="fa fa-users"></i>
					<span>Alumnos</span>

				</a>

			</li>';
		}






		if ($_SESSION["id_rol"] == 1)  {
			echo '<li>

				<a href="docente">

					<i class="fa fa-users"></i>
					<span>Docentes</span>

				</a>

			</li>';
		}






		if ($_SESSION["id_rol"] == 1 || $_SESSION["id_rol"] == 3)  {
			echo '<li>
				<a href="inscripcion">

					<i class="fa fa-users"></i>
					<span>Inscripcion</span>

				</a>

			</li>';
		}








		if ($_SESSION["id_rol"] == 1)  {
			echo '<li>

				<a href="repartidores">

					<i class="fa fa-motorcycle"></i>
					<span>Repartidor</span>

				</a>

			</li>';
		}


		if ($_SESSION["id_rol"] == 1)  {
			echo '

			<li class="treeview">

				<a href="#">

					<i class="fa fa-list-ul"></i>

					<span> Ventas </span>

					<span class="pull-right-container">

						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">

					<li>

						<a href="ventas">

							<i class="fa fa-circle-o"></i>
							<span>Administrar ventas</span>

						</a>

					</li>

					<li>

						<a href="crear-venta">

							<i class="fa fa-circle-o"></i>
							<span>Crear venta</span>

						</a>

					</li>

					<li>

						<a href="reportes">

							<i class="fa fa-circle-o"></i>
							<span>Reporte de ventas</span>

						</a>

					</li>
					

				</ul>

				<li>

					<a href="correos">

						<i class="fa fa-circle-o"></i>
						<span>Correo</span>

					</a>

				</li>

			</li>';
		}
		?>




		</ul>

	</section>

</aside>