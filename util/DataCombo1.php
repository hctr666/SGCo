<?php
    class DataCombo {
         public static function detalleCombo($result,$campo_oculto,$campo_lista,$valor_defecto){
                        foreach ($result as $datos) {
                            if($row[$campo_oculto]==$valor_defecto){
                                echo "<option value=".$row[$campo_oculto]." selected>".$row[$campo_lista]."</option> ";
                            }
                            else{								
                                echo "<option value=".$row[$campo_oculto].">".$row[$campo_lista]."</option> ";
                            }
                        }                       
        }		
		 public static function mostrar($nombre, $result,$campo_oculto,$campo_lista,$valor_defecto, $javascript){
            ?>
               		<select name=<?php echo $nombre;?> id=<?php echo $nombre;?> onchange=<?php echo $javascript;?> >
                    <?php						
						foreach($result as $row )
						{							
							if($row->$campo_oculto==$valor_defecto)							
								echo "<option value=".$row->$campo_oculto." selected>".$row->$campo_lista."</option> ";
							else
								echo "<option value=".$row->$campo_oculto.">".$row->$campo_lista."</option> ";								
						}                      
                    ?>
                    </select>	
               
            <?php
        }
		public static function mostrar1($nombre, $result,$campo_oculto,$campo_lista,$valor_defecto, $javascript){
            ?>
               		<select name='<?php echo $nombre;?>' id='<?php echo $nombre;?>' onchange="<?php echo $javascript;?>"
                    style='height:25px;color: #000; background-color: #8AC5FF; font-size: 13px;'>
                    <?php						
						foreach($result as $row )
						{							
							if($row->$campo_oculto==$valor_defecto)							
								echo "<option value=".$row->$campo_oculto." selected>".$row->$campo_lista."</option> ";
							else
								echo "<option value=".$row->$campo_oculto.">".$row->$campo_lista."</option> ";								
						}                      
                    ?>
                    </select>	
               
            <?php
        }
	    public static function mostrarEspecial($nombre, $result,$campo_oculto,$campo_lista,$valor_defecto, $javascript){
            ?>
               		<select name=<?php echo $nombre;?> onchange=<?php echo $javascript;?> >
                    <?php						
						foreach($result as $row )
						{							
							if($row->$campo_lista==$valor_defecto)							
								echo "<option value=".$row->$campo_oculto.$row->$campo_lista." selected>".$row->$campo_lista."</option> ";
							else
								echo "<option value=".$row->$campo_oculto.$row->$campo_lista.">".$row->$campo_lista."</option> ";								
						}                      
                    ?>
                    </select>	
               
            <?php
        }		 
		 
		public static function mostrar_lista($nombre, $result,$campo_oculto,$campo_lista,$valor_defecto, $javascript){
            ?>
                <select name=<?php echo $nombre;?> <?php echo  $javascript;?> >
                    <?php
                        for ($i=0;$i<pg_numrows($result);$i++) {
                            $row = pg_fetch_array($result,$i);
                            if($row[$campo_lista]==$valor_defecto){
                                echo "<option value=".$row[$campo_oculto]." selected>".$row[$campo_lista]."</option> ";
                            }
                            else{								
                                echo "<option value=".$row[$campo_oculto].">".$row[$campo_lista]."</option> ";
                            }

                        }                       
                    ?>
                </select>
            <?php
        }		 
    }
?>
