<?php
    if(isset($_SESSION["validar"])){

        header("location: home");

        exit();
    }

    if (!$_POST){
              
?> 
    <main>

        <div id="wrapper">
            
            <div class="content-wrapper">
                <div class="content custom-scrollbar">

                    <div id="login-v2" class="row no-gutters">

                        <div class="intro col-12 col-md light-fg">

                            <div class="d-flex flex-column align-items-center align-items-md-start text-center text-md-left py-16 py-md-32 px-12">

                                <div class="logo bg-secondary mb-8">
                                    <span>F</span>
                                </div>

                                <div class="title">
                                    Welcome!
                                </div>

                                <div class="description pt-2">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ullamcorper nisl erat, vel convallis elit fermentum pellentesque. Sed mollis velit facilisis facilisis viverra.
                                </div>

                            </div>
                        </div>

                        <div class="form-wrapper col-12 col-md-auto d-flex justify-content-center p-4 p-md-0">

                            <div class="form-content md-elevation-8 h-100 bg-white text-auto py-16 py-md-32 px-12">

                                <div class="title h5">Log in to your account</div>

                                <div class="description mt-2">Sed mollis velit facilisis facilisis viverra</div>

                                <form name="loginForm" id="loginForm" novalidate class="mt-8">

                                    <div class="form-group mb-4">
                                        <input type="text" class="form-control" id="usuarioIngreso" name="usuarioIngreso" aria-describedby="emailHelp" placeholder=" " />
                                        <label for="loginFormInputEmail">Usuario</label>
                                    </div>

                                    <div class="form-group mb-4">
                                        <input type="password" class="form-control" name="passwordIngreso" id="passwordIngreso" placeholder="Password" />
                                        <label for="loginFormInputPassword">Contraseña</label>
                                    </div>

                                    <div class="remember-forgot-password row no-gutters align-items-center justify-content-between pt-4">

                                        <div class="form-check remember-me mb-4">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" aria-label="Remember Me" />
                                                <span class="checkbox-icon"></span>
                                                <span class="form-check-description">Remember Me</span>
                                            </label>
                                        </div>

                                        <a href="#" class="forgot-password text-secondary mb-4">Forgot Password?</a>

                                    </div>

                                    <button type="button" id="login-button" class="submit-button btn btn-block btn-secondary my-4 mx-auto">
                                        LOG IN
                                    </button>

                                </form>

                                <div class="mensajes"></div>

                              


                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </main>
<?php } ?>