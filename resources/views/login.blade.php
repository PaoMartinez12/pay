

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



<div class="limiter">
  <div class="container-login100" >
    <div class="wrap-login100 p-t-30 p-b-50">
        <br><br><br>
      <form method="POST" action="{{ route('login') }}" id="frm_login"  class="login100-form validate-form p-b-33 p-t-5" style="background: #1C1C1C;">
        {{ csrf_field() }}
        <div class="login100-pic js-tilt" data-tilt   >
          <center>
            <img src=""  alt="IMG"   height="60px" width="250px">
          </center>
          
        </div>
        <div class="wrap-input100 validate-input" data-validate = "Enter username">
          <input id="user"  class="input100" type="text" name="username" placeholder="Usuario" >
          <span class="focus-input100" data-placeholder="&#xe82a;"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate="Enter password">
          <input id="passw" class="input100" type="password" name="password" placeholder="Contraseña">
          <span class="focus-input100" data-placeholder="&#xe80f;"></span>
        </div>

        <div class="container-login100-form-btn m-t-32">
          <button  class="login100-form-btn">
            Ingresar
          </button>
           <!-- muestra el input de token -->
           <div id="Token"></div>
        </div>



      </form>
    </div>
  </div>
</div>






