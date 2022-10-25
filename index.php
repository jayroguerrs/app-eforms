<?php 
    include_once 'templates/header_main.php';
?>

<body>
    <div class="p-5 d-flex justify-content-center m-3">
        <a href="javascript::"><img class="img-fluid" src="img/CRP_logo.svg" alt="logo"></a>
    </div>    

    
    
    <!-- Forma antigua usando FlexBox 
    <div class="d-flex flex-wrap justify-content-center mb-5">        
        <div class="text-center font-weight-bold item">
            <a href="lavado-de-manos.php">
                <div class="gif p-5 mx-4 mt-4 mb-3">
                    <div class="animate__animated animate__pulse animate__infinite animate__slow" ><img class="img-fluid mx-auto d-block" src="img/hands.svg"></div>
                </div>
            </a>
            <div >Lavado de manos</div>    
        </div>

        <div class="text-center font-weight-bold item">
            <a href="eforms/admin/index.php">
                <div class="gif p-5 mx-4 mt-4 mb-3">
                    <div class="animate__animated animate__pulse animate__infinite animate__slow"><img class="img-fluid mx-auto d-block" src="img/jci.svg"></div>
                </div>
            </a>
            <div >Joint Commission</div>    
        </div>

        <div class="text-center font-weight-bold item">
            <a href="javascript::">
                <div class="gif p-5 mx-4 mt-4 mb-3">
                    <div class="animate__animated animate__pulse animate__infinite animate__slow"><img class="img-fluid mx-auto d-block" src="img/heridas.svg"></div>
                </div>
            </a>
            <div >Consultorio de heridas</div>    
        </div>            
    </div>
    -->
       
    <div class="d-flex flex-wrap justify-content-center mb-5">
        <div class="owl-carousel owl-theme">
            <div class="text-center font-weight-bold item">
                <a href="higiene">
                    <div class="gif p-5 mx-4 mt-4 mb-3">
                        <div class="animate__animated animate__pulse animate__infinite animate__slow" ><img class="img-fluid mx-auto d-block" src="img/hands.png"></div>
                    </div>
                </a>
                <div >Lavado de manos</div>    
            </div>

            <div class="text-center font-weight-bold item">
                <a href="eforms/admin/index.php">
                    <div class="gif p-5 mx-4 mt-4 mb-3">
                        <div class="animate__animated animate__pulse animate__infinite animate__slow"><img class="img-fluid mx-auto d-block" src="img/jci.png"></div>
                    </div>
                </a>
                <div >Joint Commission</div>    
            </div>

            <div class="text-center font-weight-bold item">
                <a href="javascript::">
                    <div class="gif p-5 mx-4 mt-4 mb-3">
                        <div class="animate__animated animate__pulse animate__infinite animate__slow"><img class="img-fluid mx-auto d-block" src="img/heridas.png"></div>
                    </div>
                </a>
                <div>Consultorio de heridas</div>    
            </div>

            <div class="text-center font-weight-bold item">
                <a href="teleenfermeria">
                    <div class="gif p-5 mx-4 mt-4 mb-3">
                        <div class="animate__animated animate__pulse animate__infinite animate__slow"><img class="img-fluid mx-auto d-block" src="img/teleenfermeria.png"></div>
                    </div>
                </a>
                <div>Teleenfermería</div>    
            </div>

            <div class="text-center font-weight-bold item">
                <a href="javascript::">
                    <div class="gif p-5 mx-4 mt-4 mb-3">
                        <div class="animate__animated animate__pulse animate__infinite animate__slow"><img class="img-fluid mx-auto d-block" src="img/t_espera.png"></div>
                    </div>
                </a>
                <div>Tiempos de espera</div>    
            </div>

            <div class="text-center font-weight-bold item">
                <a href="javascript::">
                    <div class="gif p-5 mx-4 mt-4 mb-3">
                        <div class="animate__animated animate__pulse animate__infinite animate__slow"><img class="img-fluid mx-auto d-block" src="img/julia.png"></div>
                    </div>
                </a>
                <div>Julia</div>    
            </div>
        </div>    
    </div>

    
</body>

<?php include_once 'templates/footer-scripts.php' ?>
