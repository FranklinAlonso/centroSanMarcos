<?php 
    session_start();
    $usuario = $_SESSION['usuario'];
    if(isset($_SESSION['usuario'])){
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centro Medico San Marcos</title>
    <link rel="stylesheet" href="../CSS/estilo_admi.css">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="../images/favicon2.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="../images/apple-touch-icon.png">

    <link rel = "stylesheet" href = "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
</head>
<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="las la-cross"></span><span>San Marcos</span></h2>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="" class="active"><span class="las la-home"></span>
                        <span>Inicio</span></a>
                </li>
                <li>
                    <a href="../Dashboard/panel_usuario_fam.php?variable=<?php echo $usuario; ?>"><span class="las la-users"></span>
                        <span>Mis familiares</span></a>
                </li>
                <li>
                    <a href="../Dashboard/panel_usuario_hosp.php?variable=<?php echo $usuario; ?>"><span class="las la-hospital"></span>
                        <span>Hospitalización</span></a>
                </li>
                <li>
                    <a href="../Dashboard/panel_usuario_historial.php?variable=<?php echo $usuario; ?>"><span class="las la-list"></span>
                        <span>Mi historial</span></a>
                </li>
                <li>
                    <a href="../Dashboard/panel_usuario_info.php?variable=<?php echo $usuario; ?>"><span class="las la-user"></span>
                        <span>Mi informacion</span></a>
                </li>
                <li>
                    <a href="../Dashboard/panel_usuario_cita.php?variable=<?php echo $usuario; ?>"><span class="las la-user-circle"></span>
                        <span>Sacar cita</span></a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>
                Dashboard
            </h2>

            <div class="user-wrapper">
                <div>
                    <h4><?php echo $usuario?></h4>
                    <small>Paciente</small>
                    <a href="salir2.php">Cerrar Sesion</a>
                </div>
            </div>
        </header>

        <main>

            <div class="cards">
                <div class="card-single">
                    <div>
                        <?php
                            $conn = mysqli_connect("localhost", "root","", "segurodb");
                            if (!$conn) {
                                die("Error de conexion: " . mysqli_connect_error());
                            }
                            $query = mysqli_query($conn,"SELECT * FROM paciente where usuario = '".$usuario."'");
                            $row = mysqli_fetch_array($query);
                            $query2 = mysqli_query($conn,"SELECT * FROM familiar where ID_Paciente = '".$row['ID_Paciente']."'");
                            $num_resultados = mysqli_num_rows($query2);
                            echo "<h1>".$num_resultados."</h1>";
                        ?>
                        <span>Familiares</span>
                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <?php
                            $conn = mysqli_connect("localhost", "root","", "segurodb");
                            if (!$conn) {
                                die("Error de conexion: " . mysqli_connect_error());
                            }
                            $query = mysqli_query($conn,"SELECT * FROM paciente where usuario = '".$usuario."'");
                            $row =  mysqli_fetch_array($query);
                            $query2 = mysqli_query($conn,"SELECT * FROM historial where id_Paciente = '".$row['ID_Paciente']."'");
                            $num_resultados = mysqli_num_rows($query2);
                            echo "<h1>".$num_resultados."</h1>";
                        ?>
                        <span>Citas Realizadas</span>
                    </div>
                    <div>
                        <span class="las la-check"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <?php
                            $conn = mysqli_connect("localhost", "root","", "segurodb");
                            if (!$conn) {
                                die("Error de conexion: " . mysqli_connect_error());
                            }
                            $query = mysqli_query($conn,"SELECT * FROM paciente where usuario = '".$usuario."'");
                            $row =  mysqli_fetch_array($query);
                            $query2 = mysqli_query($conn,"SELECT * FROM historial where id_Paciente = '".$row['ID_Paciente']."'");
                            $num_resultados = mysqli_num_rows($query2);
                            echo "<h1>".$num_resultados."</h1>";
                        ?>
                        <span>Citas Pendientes</span>
                    </div>
                    <div>
                        <span class="las la-hospital"></span>
                    </div>
                </div>

            </div>

            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h3>Citas medicas</h2>
                            <a href="panel_usuario_citas">Ver Mas</a>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%">
                                    <tr>
                                        <td>Historial</td>
                                        <td>Fecha</td>
                                        <td>Sede</td>
                                        <td>Doctor</td>
                                    </tr>
                                    <tbody>
                                        <?php
                                            $conn = mysqli_connect("localhost", "root","", "segurodb");
                                            if (!$conn) {
                                                die("Error de conexion: " . mysqli_connect_error());
                                            }
                                            $query = mysqli_query($conn,"SELECT * FROM paciente where usuario = '".$usuario."'");
                                            $row = mysqli_fetch_array($query);
                                            $query2 = mysqli_query($conn,"SELECT * FROM historial where id_Paciente = '".$row['ID_Paciente']."'");
                                            $num_resultados = mysqli_num_rows($query2);
                                            if($num_resultados < 1){
                                                echo "<tr>
                                                            <td>No Hay</td>
                                                            <td>No Hay</td>
                                                            <td>No Hay</td>
                                                            <td>No Hay</td>
                                                    </tr>";
                                            }else{
                                                for ($i=0; $i <$num_resultados; $i++) {
                                                    $row = mysqli_fetch_array($query2);
                                                    $query3 = mysqli_query($conn,"SELECT * FROM doctor where id_Doctor = '".$row['id_Doctor']."'");
                                                    $row2 = mysqli_fetch_array($query3);
                                                    echo "<tr>
                                                            <td>".$row['NumHistorial']."</td>
                                                            <td>".$row['Fecha']."</td>
                                                            <td>".$row['Sede']."</td>
                                                            <td>".$row2['Nombre']." ".$row2['Apellido']."</td>
                                                        </tr>";
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="customers">
                        <div class="card">
                            <div class="card-header">
                                <h3>Familiares</h2>
                            </div>
    
                            <div class="card-body">
                            <?php
                                    $conn = mysqli_connect("localhost", "root","", "segurodb");
                                    if (!$conn) {
                                        die("Error de conexion: " . mysqli_connect_error());
                                    }
                                    $query = mysqli_query($conn,"SELECT * FROM paciente where usuario = '".$usuario."'");
                                    $row = mysqli_fetch_array($query);
                                    $query2 = mysqli_query($conn,"SELECT * FROM familiar where ID_Paciente = '".$row['ID_Paciente']."'");
                                    $num_resultados = mysqli_num_rows($query2);
                                    if($num_resultados < 1){
                                        echo "<div class=\"customer\">
                                            <div class=\"info\">
                                                <img src=\"\" width=\"40px\" height=\"40px\" alt=\"\">
                                                <div>
                                                    <h4>No hay</h4>
                                                    <small>No hay</small>
                                                </div>
                                            </div>
                                            <div class=\"contact\">
                                                <span class=\"las la-user-circle\"></span>
                                                <span class=\"las la-comment\"></span>
                                                <span class=\"las la-phone\"></span>
                                            </div>
                                            </div>";
                                    }else{
                                        for ($i=0; $i <$num_resultados; $i++) {
                                            $row = mysqli_fetch_array($query2);
                                            echo "<div class=\"customer\">
                                            <div class=\"info\">
                                                <img src=\"\" alt=\"\">
                                                <div>
                                                    <h4>".$row['Nombre']." ".$row['Apellido']."</h4>
                                                    <small>".$row['Dni']."</small>
                                                </div>
                                            </div>
                                            <div class=\"contact\">
                                                <span class=\"las la-user-circle\"></span>
                                                <span class=\"las la-comment\"></span>
                                                <span class=\"las la-phone\"></span>
                                            </div>
                                            </div>";
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>

<?php
    }else{
        header("location: ../Sesion/login.html");
        exit();
    }
?>