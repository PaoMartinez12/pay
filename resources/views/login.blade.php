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
    </head>

    <body>
        <div class="container">
          <div class="row">
              <div class="col-md-6">
                  <div class="card">
                      <form class="box"  method="POST" action="{{ route('login') }}" id="frm_login">
                        {{ csrf_field() }}
                          <h1>Login</h1>
                          <p class="text-muted"> Please enter your login and password!</p> 
                          <input type="text" name="username" id="username" placeholder="Usuario">
                           <input type="password" name="password" id="password" placeholder="Password"> 
                           <a class="forgot text-muted" href="#">Forgot password?</a> 
                           <input type="submit" name="" value="Login" href="#">
                          <div class="col-md-12">
                              <ul class="social-network social-circle">
                                  <li><a href="#" class="icoFacebook" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                  <li><a href="#" class="icoTwitter" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                  <li><a href="#" class="icoGoogle" title="Google +"><i class="fab fa-google-plus"></i></a></li>
                              </ul>
                          </div>
                      </form>
                  </div>
                </div>
            </div>
        </div>
    </body>
</html>