<!DOCTYPE html>
<html lang="en">
    <head>   
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Login</title>
      <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="{{ asset('css/login/login.css') }}">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
       {{-- <div class="container" >
          <div class="row">
              <div class="col-md-6">
                  <div class="card">
                     
              <form class="box"  method="POST" action="{{ route('login') }}" id="frm_login" class="frm_login">
                        {{ csrf_field() }}
                          <!--h1>Iniciar Sesión</h1-->

                          <div>
                            <img src="{{asset('img/logos/Beenet-logo.png')}}" width="100px;" height="75px;">
                        
                            
                         <div>
                           
                          <input type="text" name="username" id="username" placeholder="Usuario" required>
                           <input type="password" name="password" id="password"  placeholder="Password" required> 
                      
                           <input type="submit" name="" value="Login" href="#">
                          
                      </form>

                      
                  </div>
                </div>
            </div>
        </div>
        --}}
       <div class="limiter">
		<div class="container-login100" style="background-image: url({{asset('img/logos/background.jpg')}});">
            <div class="wrap-login100 p-t-190 p-b-30" >
                
				<form class="login100-form validate-form"  method="POST" action="{{ route('login') }}" id="frm_login" >
                    {{ csrf_field() }}
					<div class="login100-form-avatar">
						<img src="{{asset('img/logos/logoblancobeenet.png')}}" alt="logo">
					</div>

					

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
						<input class="input100" type="text" name="username" id="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" 100px></i>
						</span>
                    </div>
                    <br> <br>  <br>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
						<input class="input100" type="password" name="password" id="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>
                    <br> <br>  <br>
					<div class="container-login100-form-btn p-t-10">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

				
				</form>
			</div>
		</div>
	</div>
        
     
    
    </body>
</html>