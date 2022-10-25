<?php
  session_start();
  include_once 'templates/header.php' ; 
?>
  
  <body>
    <!--[if IE]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->
  
    <!-- Add your site or application content here -->
    <section class="vh-100" style="background-color: #00B2A9;">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col col-xl-10">
            <div class="card" style="border-radius: 1rem;">
              <div class="row g-0">
                <div class="col-md-6 col-lg-5 d-none d-md-block">
                  <img
                    src="img/img1.webp"
                    alt="login form"
                    class="img-fluid" style="border-radius: 1rem 0 0 1rem;"
                  />
                </div>
                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                  <div class="card-body p-4 p-lg-5 text-black">
    
                    <form id="login"  method="post" action="login-admin.php">
                      <div class="d-flex align-items-center mb-3 pb-1">
                        <i class="fas fa-cubes fa-2x me-3" ></i>
                        <span class="h1 fw-bold mb-0">EForms<b>CRP</b></span>
                      </div>
    
                      <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Inicie sesión con su cuenta</h5>
    
                      <div class="form-outline mb-4">
                        <input type="text" name="usuario" class="form-control form-control-lg" required>
                        <label class="form-label" for="usuario">Usuario</label>
                      </div>
    
                      <div class="form-outline mb-4">
                        <input type="password" name="password" class="form-control form-control-lg" required/>
                        <label class="form-label" for="password">Contraseña</label>
                      </div>
    
                      <div class="pt-1 mb-4">
                        <input type="hidden" name="tipo" value="login">
                        <button type="submit" class="btn btn-dark btn-lg btn-block" >Iniciar</button>
                      </div>
    
                      <a class="small text-muted" href="#!">¿Olvidaste tu contraseña?</a>
                      <p class="mb-5 pb-lg-2" style="color: #393f81;">¿No tienes una cuenta?<a href="#!" style="color: #393f81;">Registrate aquí</a></p>
                      <a href="#!" class="small text-muted">Terms of use.</a>
                      <a href="#!" class="small text-muted">Privacy policy</a>
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  
<?php
  include_once 'templates/footer-scripts.php'; 
?>


