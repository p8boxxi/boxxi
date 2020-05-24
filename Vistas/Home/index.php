<?php     
require_once "../../Controladores/SesionesController.php";
$objecteSessio = new SesionesController();

//GP  
require_once "../../Controladores/SesionesController.php";
$objecteSessio = new SesionesController();

//AP
$title = 'Index'; 
$currentPage = 'Index'; 
include '../../Vistas/Header/header.php';    
?>

<body>

    <?php  

    //GP
    // if(!empty($_SESSION["id_usuario"])){
    //             echo "eres el usuario con ID: ".$_SESSION["id_usuario"];
    //             echo "<br>";
    //             echo "eres ".$_SESSION["rol"];
    // }  

    if (isset($_SESSION["login"])){

        if ($_SESSION["login"]==false){

            if (isset($_SESSION["mensajeLogin"])){
                // AZ
                echo "<div class='modal fade' id='wrongModal1' tabindex='-1' role='dialog' aria-labelledby='wrongModal1' aria-hidden='true'>";
                echo "<div class='modal-dialog' role='document'>";
                echo "<div class='modal-content p-4 text-center'>";
                echo "<a class='close' data-dismiss='modal'>×</a>";
                echo "<p class='m-0'><b>".$_SESSION["mensajeLogin"]."</b></p>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "<script>$('#wrongModal1').modal('show');</script>";
                unset($_SESSION["mensajeLogin"]);
            }
        }else{
            if (isset($_SESSION["Denegado"])){
                // AZ
                echo "<div class='modal fade' id='wrongModal2' tabindex='-1' role='dialog' aria-labelledby='wrongModal2' aria-hidden='true'>";
                echo "<div class='modal-dialog' role='document'>";
                echo "<div class='modal-content p-4 text-center'>";
                echo "<a class='close' data-dismiss='modal'>×</a>";
                echo "<p class='m-0'><b>".$_SESSION["Denegado"]."</b></p>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "<script>$('#wrongModal2').modal('show');</script>";
                unset($_SESSION["Denegado"]);
            }
        }
    }
    
    if (isset($_SESSION["mensajeResultado"])){
        echo $_SESSION["mensajeResultado"];
        unset($_SESSION["mensajeResultado"]);
    }

    // echo "<br>";
    // echo "<a href='Controladores/SesionesController.php?operacion=cerrarSesion'>Salir de  La Sesion</a>";

    ?>

    <!--portada-->
    <div id="mycuerpo" class="container-fluid text-center" >
        <div class="row secciones-gris">
            <div class="col-4 "></div>
            <div class="col-4 text-center">
                <h1 class="titolindex text-center">CARTÓN RECICLADO</h1>
                <p>Construye tu casa con muebles hechos de cartón. 
                Reciclados, resistentes y ecofriendly..</p>
            </div>
            <div class="col-4 "></div>

        </div>
        <div class="row content" > 
            <div class="col-sm portada" > 
                <img src="/Vistas/assets/img/portada-01.png" class="img-responsive" >
            </div>
        </div>

        <!--nosotros-->
        <div  class="row ">
            <div class="col-1 "></div>
            <div class="col-5 ">
                <h1 class="titolindex text-center">nosotros</h1>
                <div class="text-left">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laboru.</p>
                </div>
            </div>
            <div class="col-5 ">
                <div class="col-sm portada" > 
                    <img src="/Vistas/assets/img/portada-02.png" class="img-responsive" >
                </div>
            </div>
            <div class="col-1 "></div>
        </div>

        <!--idea-->
        <div class="row secciones-gris">
            <div class="col-1 "></div>
            <div class="col-5 ">
                <div class="col-sm portada" > 
                    <img src="/Vistas/assets/img/portada-03.png" class="img-responsive" >
                </div>
            </div>
            <div class="col-5 ">
                <h1 class="titolindex text-center">idea</h1>
                <div class="text-left">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laboru.</p>
                </div>
            </div>
            <div class="col-1 "></div>
        </div>


        <!--descubre-->
        <div  class="row secciones-naranja">
            <div class="col-2 "></div>
            <div class="col-4 ">
                <div class="row text-center">
                    <h1 class="titolindex text-center">descubre</h1>
                    <p>Entra en nuestra tienda para ver todas nuestras propuestas.</p>
                    <button>tienda</button>
                </div>
            </div>
            <div class="col-4 ">
                <div class="col-sm portada" > 
                    <img src="/Vistas/assets/img/portada-04.png" class="img-responsive" >
                </div>    
            </div>
            <div class="col-1 "></div>

        </div>
    </div>

    <!--slider-->
    <div class="row">          
            <div class="col-3 "></div>
            <div class="col-6 ">
                <h1 class="titolindex text-center">galeria muebles</h1>
            </div>
            <div class="col-3 "></div>
        <div class="row slide-show">
            <div class="col-3 ">
                <img src="/Vistas/assets/img/productos/ALISTON01.jpg" class="img-responsive" >
            </div>
            <div class="col-3 ">
                <img src="/Vistas/assets/img/productos/ALISTON01.jpg" class="img-responsive" >
            </div>
            <div class="col-3 ">
                <img src="/Vistas/assets/img/productos/ALISTON01.jpg" class="img-responsive" >
            </div>            
            <div class="col-3 ">
                <img src="/Vistas/assets/img/productos/ALISTON01.jpg" class="img-responsive" >
            </div>
            
        </div>
    </div>







    <?php include '../../Vistas/Footer/footer.php'; ?>

</body>

</html>