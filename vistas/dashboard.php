<?php 

  session_start();

  if(!isset($_SESSION['id_usuario'])){
    header("Location: ../login.php");
  }

?>
<!DOCTYPE html>

<html lang="en" >
  <head>
    <meta charset="UTF-8">
    <!-- Drop Down Sidebar Menu-->
    
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <link href="../styles/dashboard.css" rel="stylesheet" type="text/css">
     <link href="../styles/general.css" rel="stylesheet" type="text/css">
   </head>
<body>
 <div class="row">
    <aside>   
 <div class="sidebar close">
    <div class="logo-details">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
    </div>
      
      <span class="logo_name">Más Credito</span>
    </div>
    
    <ul class="nav-links">
      <li>
      <div class="iocn-link">
          <a href="#">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Dashboard</span>
        </a>
       
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="dash3.php">Dashboard</a></li>
          <li><a href="../vistas/dash3.php">Dashboard</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-collection' ></i>
            <span class="link_name">Clientes</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Clientes</a></li>
          <li><a href="../vistas/clientesregistro.php">Nuevo Cliente</a></li>
          <li><a href="../vistas/BuscarClientes.php">Búsqueda de clientes</a></li>
          <li><a href="../vistas/listanegra.php">Lista negra</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-book-alt' ></i>
            <span class="link_name">Prestamos</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Prestamos</a></li>
          <li><a href="Bclientes.php">Nueva Solicitud</a></li>
          <?php if($_SESSION['tipo'] == "administrador" || $_SESSION['tipo'] == "supervisor"){ ?>
          
          <li><a href="Desembolsopendiente.php">Desembolsos Pendientes</a></li>
          <li><a href="../vistas/HistorialP.php">Historial de préstamos</a></li>
          <li><a href="../vistas/transferenciasC.php">Transferencia de carteras</a></li>
          <?php } ?>
          <li><a href="../vistas/simulador.php">Simulador de Pagos</a></li>

        </ul>
      </li>
      <li>

      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-book-alt' ></i>
            <span class="link_name">Pagos</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="">Pagos</a></li>
          <li><a href="../vistas/Pago.php">Registrar Pagos</a></li>
          <li><a href="../vistas/BPagosClientes.php">Historial de Pagos por Cliente</a></li>
          <li><a href="../vistas/HistorialPagos.php">Historial de Pagos por Asesor</a></li>
               </ul>
      </li>
      
      <?php if($_SESSION['tipo'] == "administrador" || $_SESSION['tipo'] == "supervisor"){ ?>
    
      <li>
        <div class="iocn-link">
          <a href="#">
          <i class='bx bx-line-chart' ></i>
            <span class="link_name">Registro de Gastos  </span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="../vistas/RegistroDeGastos.php">Registro de gastos</a></li>
          <li><a href="../vistas/RegistrarGasto.php">Registrar nuevo gasto</a></li>
          <li><a href="../vistas/RegistroDeGastos.php"> Busqueda de gatos</a></li>
               </ul>
      </li>

      <li>
        <div class="iocn-link">
          <a href="#">
          <i class='bx bx-compass' ></i>
            <span class="link_name">Reportes  </span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">

          <li><a href="../vistas/Activos.php">Activos(No Vencidos) </a></li>
          <li><a href="../vistas/FaltadePago.php">Falta de pago</a></li>
          <li><a href="../vistas/morosidad.php">Morosidad</a></li>      
        <!--  <li><a href="../vistas/carteraVencida.php">Cartera Vencida </a></li>
          <li><a href="../vistas/carteraMuerta.php">Cartera Muerta </a></li>  -->
          <li><a href="../vistas/inactivos.php">Clientes inactivos </a></li>
          <li><a href="../vistas/resumen.php">Rendimiento </a></li>      </ul>
      </li>


      <li>
      <div class="iocn-link">
          <a href="#">
          <i class='bx bx-compass' ></i>
          <span class="link_name">Bitacora </span>
        </a>
       
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="Bitacora.php">Bitacora de sistema</a></li>
          <li><a href="../vistas/Bitacora.php">Bitacora </a></li>
        </ul>
      </li>
     

      <li>
      <div class="iocn-link">
          <a href="#">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Usuarios </span>
        </a>
       
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="">usuarios</a></li>
          
          <?php if($_SESSION['tipo'] == "administrador"){ ?>
            <li><a href="../vistas/registrousuario.php">Crear usuario </a></li>
          <?php } ?>
          <li><a href="../vistas/usuarios.php">Busqueda Usuarios </a></li>
        </ul>
      </li>

      <li>
      <div class="iocn-link">
          <a href="#">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Sedes </span>
        </a>
       
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="">sedes</a></li>
          <li><a href="../vistas/NuevaSede.php">Crear Sede </a></li>
          <li><a href="../vistas/Bsede.php">Buscar Sede </a></li>
        </ul>
      </li>
        <?php } ?>

      <li>
    <div class="profile-details">
      <div class="profile-content">
        <!--<img src="image/profile.jpg" alt="profileImg">-->
      </div>
      <div class="name-job">
        <div class="profile_name"><?php echo $_SESSION['nombre'] ?></div>
        <div class="job"><?php echo $_SESSION['tipo'] ?></div>
      </div>
      <a href="../class/exit.php">  
      <i class='bx bx-log-out' ></i>
      </a>
    </div>
  </li>
</ul>
  </div>

  <script>
  let arrow = document.querySelectorAll(".arrow");
  for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e)=>{
   let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
   arrowParent.classList.toggle("showMenu");
    });
  }
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".bx-menu");
  sidebarBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("close");
  });
  </script>

</aside>
</div>
</body>
</html>
