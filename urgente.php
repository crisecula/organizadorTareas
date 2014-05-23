<div align='center'>  
    <table border='1' cellpadding='0' cellspacing='0' width='600' bgcolor='#F6F6F6' bordercolor='#FFFFFF'> 
        <tr>
            <th>FECHA DE ENTREGA</th>
            <th>TAREA</th>
            <th>DESCRIPCION</th>
            <th>ASIGNATURA</th>
            <th>PUNTUACION</th>
            <th>EDITAR</th>
        </tr>
        <?php
            include('abreConexionBD.php');

            $query = "SELECT * FROM Tareas ORDER BY Fecha_Fin DESC";
            $result = mysql_query($query, $link);
            $i = 0;

            while ($registro = mysql_fetch_array($result))
            {
                if (!$registro['Terminada'] && ($i < 3))
                {
                    $i++;
                    echo "
                        <tr>
                        <td>" . $registro['Fecha_Fin'] . "</td>
                        <td class='larga'>" . $registro['Nombre'] . "</td>
                        <td class='larga'>" . $registro['Descripcion'] . "</td>
                        <td>" . $registro['Asignatura'] . "</td>
                        <td>" . $registro['Puntuacion'] . "</td>
                        <td>
                    ";
                    
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
