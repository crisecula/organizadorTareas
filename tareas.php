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
            <h1>TAREAS PENDIENTES</h1>
            <h2>Listado de tareas por hacer</h2>
            <div align='center'>  
                <table border='1' cellpadding='0' cellspacing='0' width='600' bgcolor='#F6F6F6' bordercolor='#FFFFFF'> 
                    <tr>
                        <td style='font-weight: bold'>FECHA DE ENTREGA</td>
                        <td style='font-weight: bold'>TAREA</td>
                        <td style='font-weight: bold'>DESCRIPCION</td>
                        <td style='font-weight: bold'>ASIGNATURA</td>
                        <td style='font-weight: bold'>PUNTUACION</td>
                        <td style='font-weight: bold'>EDITAR</td>
                    </tr>
                    <?php
                        include('abreConexionBD.php');
                        
                        $result = mysql_query("SELECT * FROM Tareas", $link);
                        
                        while ($registro = mysql_fetch_array($result)) {
                            if (!$registro['Terminada'])
                            {
                                echo "
                                <tr>
                                    <td>" . $registro['Fecha_Fin'] . "</td>
                                    <td>" . $registro['Nombre'] . "</td>
                                    <td>" . $registro['Descripcion'] . "</td>
                                    <td>" . $registro['Asignatura'] . "</td>
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
                        }
                        include('cierraConexionBD.php');
                    ?>
                </table>
            </div>
        </section>
        
        <section class="content" id="inicio">
            <h1>TAREAS TERMINADAS</h1>
            <h2>Listado de tareas terminadas</h2>
            <div align="center">
                <table border='1' cellpadding='0' cellspacing='0' width='600' bgcolor='#F6F6F6' bordercolor='#FFFFFF'> 
                    <tr>
                        <td width='150' style='font-weight: bold'>FECHA DE ENTREGA</td>
                        <td width='150' style='font-weight: bold'>TAREA</td>
                        <td width='150' style='font-weight: bold'>DESCRIPCION</td>
                        <td width='150' style='font-weight: bold'>ASIGNATURA</td>
                        <td width='150' style='font-weight: bold'>PUNTUACION</td>
                    </tr>
                    <?php
                        include('abreConexionBD.php');
                        
                        $result = mysql_query("SELECT * FROM Tareas", $link);
                        
                        while ($registro = mysql_fetch_array($result)) {
                            if ($registro['Terminada'])
                            {
                                echo "
                                <tr>
                                    <td>" . $registro['Fecha_Fin'] . "</td>
                                    <td>" . $registro['Nombre'] . "</td>
                                    <td>" . $registro['Descripcion'] . "</td>
                                    <td>" . $registro['Asignatura'] . "</td>
                                    <td>" . $registro['Puntuacion'] . "</td>
                                </tr>
                            ";
                            }
                        }
                        include('cierraConexionBD.php');
                    ?>
                </table>
            </div>
        </section>
    </body>
</html>