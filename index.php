<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Elelog</title>
    <link rel="stylesheet" href="./Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="Bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
    <?php
    $userErr=""; 

    //validaciones
    if(isset($_POST["boton"])){
       $userErr = validateForm(); 
       //formula para validar que se hayan ingresado los datos de usuario y contraseña, y para validar el formato de email.
        
       //si la variable $userErr queda vacía, entonces los datos están validados y seguimos con el login
       if(empty($userErr)){ 
            $user = $_POST["usuario"];
            $pass = $_POST["contraseña"];
        
            if ($user == "elelog@elelog.es" && md5($pass) == "827ccb0eea8a706c4c34a16891f84e7b"){
                header('Location: ./Sections/welcome.php');
            }else{
                $userErr = "Usuario incorrecto";
            }
       }
        
    }
    
    //Defino la función que llamé arriba
    function validateForm(){
        $error = "";

        //Valido que se ingreso Usuario
        if(!isset($_POST["usuario"]) || empty($_POST["usuario"])){
            $error = "Ingresar Usuario \n";
        }else if(!filter_var($_POST["usuario"], FILTER_VALIDATE_EMAIL)){
        //Valido que el mail sea válido
            $error = "Ingrese correctamente su usuario/email registrado \n";
        }
        //Valido que se ingreso Contraseña
        if(!isset($_POST["contraseña"]) || empty($_POST["contraseña"])){
            $error = $error . "Ingresar contraseña \n";
        }
        
        return $error; //la función retorna una variable de tipo string (o un string vacío)
    }

  

    ?> 
    <header>
        <div class="container">
            <a href="./">
                <img src="./IMG/elelog.png" alt="Elelog SL Icon" class="img-icon">
            </a>
        </div>
    </header>
    <section class="section-center">
        <form method="post">
            <div class="form row">
                    <h1>Login Elelog SL</h1>
                    <p><span class="error-text">* Campos Obligatorios</span></p>

                    <label for="emailInput" class="form-label"> Usuario * </label>
                    <input type="email" name="usuario" class="form-control" placeholder="nombre@email.com" required> 
                    <p id="usuarioInfo" class="form-text">Ingrese su Usuario/email registrado</p>

                    <label for="passInput" class="form-label"> Contraseña *</label>
                    <input type="password" name="contraseña" class="form-control" required>
                    <p id="passInfo" class="form-text">Ingrese su Password</p>
                    <?php 
                        echo "<p style='color:red'>" . $userErr . "</p>";
                    ?>
                    
                
        
                <div class="container">
                    <button type="submit" name="boton" class="btn btn-primary">
                        Login
                    </button>
                </div>
            </div>
        </form> 
    </section>
    <hr/>
</body>

<footer class="container">
    Creado por Vanesa Burman - Jun 2021
</footer>




</html>