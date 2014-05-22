<!DOCTYPE html>
<html lang="es">
    
    <head>
        <?php include('headBasico.html'); ?>
    </head>
    
    <body>
        <img class="burbujas" src="images/para.png" alt="fondo burbujas">
        
        <header>
            <?php include('menu.html'); ?>
        </header>
                
        <section class="content" id="inicio">
            <h1>TAREAS POR ASIGNATURA</h1>
            
            <div align='center'>  
              <table border='1' cellpadding='0' cellspacing='0' width='600' bgcolor='#F6F6F6' bordercolor='#FFFFFF'> 
                <tr>
                    <td style='font-weight: bold'>ASIGNATURA</td>
                    <td style='font-weight: bold'>FECHA DE ENTREGA</td>
                    <td style='font-weight: bold'>TAREA</td>
                    <td style='font-weight: bold'>DESCRIPCION</td>
                    <td style='font-weight: bold'>PUNTUACION</td>                    
                    <td style='font-weight: bold'>EDITAR</td>
                </tr>                    
                    <form action="terminar.php" method="post">
                        <?php
                            include('abreConexionBD.php');
                            
                            if ($_POST)
                            {
                                $asignatura = $_POST['asignatura'];
                                $result = mysql_query("SELECT * FROM Tareas WHERE Asignatura = '$asignatura'", $link);
                                
                                while ($registro = mysql_fetch_array($result))
                                {
                                    echo "
                                    <tr>
                                        <td>" . $registro['Asignatura'] . "</td>
                                        <td>" . $registro['Fecha_Fin'] . "</td>
                                        <td>" . $registro['Nombre'] . "</td>
                                        <td>" . $registro['Descripcion'] . "</td>
                                        <td>" . $registro['Puntuacion'] . "</td>                                    
                                        <td>";
                                        if ($registro['Terminada'])
                                        {
                                            echo "Terminada";
                                        }
                                        else
                                        {
                                            echo "<input value='terminar' name='" . $registro['Id'] . "' type='submit'/>";
                                        }                                    
                                        echo "</td>
                                    </tr>
                                ";
                                    
                                }
                                include('cierraConexionBD.php');
                            }
                        ?>
                    </form>
                </table>
            </div>
        </section>
    </body>
</html>