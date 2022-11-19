
                <!-- <?php print_r($Cuota) ?> -->
                <!--  <?php for ($i = 0; $i < $CantCuota; $i++) { ?>
 
 
 
                   <tr class=<?php echo ($i % 2 == 0) ?  'table-info' : ''; ?>>
                     <td><?php echo $i + 1 ?></td>
                     <td><?php echo $Cuota[$i]['IdCuota'] ?></td>
                     <td><?php echo convertir_fechaMesAnio($Cuota[$i]['MesCuota']) ?></td>
                     <td><?php echo $Cuota[$i]['CatSocio'] ?></td>
                     <td><?php echo $Cuota[$i]['VCUOTA'] ?></td>
                     <td><?php echo convertir_fecha($Cuota[$i]['FVENC'], "s") ?></td>
                     <td>
 
                       <!-- <button class="btn btn-info" >Modificar</button> -->
                       <button class="btn btn-danger cuota-delete" data-iddetcuota="<?php echo $Cuota[$i]['IdDetCuota'] ?>">Eliminar</button>
                   </tr>
                 <?php } ?> -->
 
 