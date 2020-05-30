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
    <div id="mycuerpo" class="container-fluid text-center " >
        <div class="row fila secciones-gris primera">
            <div class="col-4 "></div>
            <div class="col-4 text-center titol">
                <h1 class=" text-center titolindex">CARTÓN RECICLADO</h1>
                <hr>
                <p>Construye tu casa con muebles hechos de cartón. 
                Reciclados, resistentes y ecofriendly.</p>
            </div>
            <div class="col-4 "></div>

        </div>
        <div class="row secciones-gris" > 
            <div class="col-sm portada" > 
                <img src="/Vistas/assets/img/portada-01.png" class="img-responsive" >
            </div>
        </div>

        <!--nosotros-->
        <div id="nosotros" class="row fila">
            <div class="col-1 "></div>
            <div class="col-5 secciones-l text-left ">
                <h2 class="titolseccio" >nosotros</h2>
                <hr>
                <div class="text-left">
                    <p>Boxxi es un proyecto que nace tras comprobar que la sociedad ha ido creando productos en su mayoría sin pararse a pensar en el daño medioambiental que su fabricación y uso han causado.</p>

                    <p>En Boxxi cuidamos la producción artesanal de artículos que respetan en todo momento el medioambiente, poniendo énfasis en los materiales utilizados para su fabricación y facilitando la no degradación del entorno ambiental una vez ha finalizado su vida útil.</p>

                </div>
            </div>
            <div class="col-6 secciones-img-right" >
                <div class="col-sm " > 
                    <img src="/Vistas/assets/img/portada-02.png" class="img-responsive" style="width: 900px; height:auto;" >
                </div>
            </div>
        </div>

        <!--idea--><!-- "/Vistas/assets/img/productos/ALISTON01.jpg -->
        <div id="idea" class="row fila secciones-gris" style="background-color: #fcfaf8;">
            <div class="col-6  text-right">
                <div class="col-sm secciones-img-left" > 
                    <img src="/Vistas/assets/img/portada-03.jpg" class="img-responsive" >
                </div>
            </div>
            <div class="col-5 secciones-r text-right">
                <h2 class="titolseccio">idea</h2>
                <hr>
                <div class="text-right">
                    <p>Nuestra idea de negocio es la creación de una empresa destinada al reciclaje de papel y a la fabricación de productos de cartón reciclado, principalmente mobiliario orientado a la decoración de interiores, que diseñamos nosotros mismos y así damos respuesta a las necesidades de los clientes concienciados con el respeto al medioambiente y que buscan alternativas a productos cuyos materiales y procesos de producción dañan el entorno natural. </p>

                </div>
            </div>
            <div class="col-1 "></div>
        </div>


        <!--descubre-->
        <div id="descubre" class="row fila secciones-naranja">
            <div class="col-2 ">
                <div class="col-sm secciones-img-graf" > 
                    <img src="/Vistas/assets/img/portada-grafismo-01.png" class="img-responsive" >
                </div>
            </div>
            <div class="col-4 secciones-m text-center">
                <h2 class="titolseccio">descubre</h2>
                <div class="text-center parrafo-b">
                    <p >Entra en nuestra tienda para ver todas nuestras propuestas.</p>
                </div>
                <div class="bt-default " >
                    <button>
                        <a href="/Vistas/Home/tienda.php">Tienda</a>
                    </button>                

                </div>
            </div>
            <div class="col-4 ">
                <div class="col-sm secciones-img-middle" > 
                    <img src="/Vistas/assets/img/portada-04.png" class="img-responsive" >
                </div>    
            </div>
            <div class="col-2 ">
                <div class="col-sm secciones-img-graf girada" > 
                    <img src="/Vistas/assets/img/portada-grafismo-01.png" class="img-responsive" >
                </div>
            </div>

        </div>


        <!--slider-->
        <div id="galeria" class=" fila">          
            <div class="row fila" >

                <div class="col-3 "></div>
                <div class="col-6 secciones-m color text-center">
                    <h2 class="titolseccio">galeria de muebles</h2>
                </div>
                <div class="col-3 "></div>
            </div>

            <div class="row mx-auto my-auto" >
                <div class="col-2 "></div>
                <div id="recipeCarousel" class="col-8 carousel slide w-75" data-ride="carousel">
                    <div class="carousel-inner w-100" role="listbox">
                        <div class="carousel-item active">
                            <img width="200" height="auto" class="d-block img-fluid" src="/Vistas/assets/img/productos/ALISTON01.jpg">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="/Vistas/assets/img/productos/BYRON01.jpg">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="/Vistas/assets/img/productos/DUSTIN01.jpg">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="/Vistas/assets/img/productos/JARA01.jpg">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="/Vistas/assets/img/productos/MAGIC01.jpg">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="/Vistas/assets/img/productos/MAILIA01.jpg">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#recipeCarousel" role="button" data-slide="next">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#recipeCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="col-2 "></div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('#recipeCarousel').carousel({
          interval :3000
      })

        $('.carousel .carousel-item').each(function(){
            var next = $(this).next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));

            for (var i=0;i<2;i++) {
                next=next.next();
                if (!next.length) {
                    next = $(this).siblings(':first');
                }

                next.children(':first-child').clone().appendTo($(this));
            }
        });
    </script>







    <?php include '../../Vistas/Footer/footer.php'; ?>

</body>

</html>