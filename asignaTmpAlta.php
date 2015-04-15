<?php if (isset($_SESSION['codi_usua'])): ?>
     <center>
    <div>
    <h2>Establecer Fecha de Temporada de verano</h2>
    <br/>       
        <form name="frmTmp">
            <table>
                <tr>
                    <td>Año:</td>
                    <td>
                        <select id="cmbYear" name="cmbYear">
                            <?php 
                                echo "<option>seleccionar</option>";
                                for ($i=2013; $i < 2060; $i++) { 
                                    echo "<option>$i</option>";
                                }
                             ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Fecha inicial:</td>
                    <td><div id="f_inic"><input type="text" id="fech_inic" maxlength="10" name="fech_inic"/></div></td>
                </tr>
                <tr>
                    <td>Fecha final:</td>
                    <td><div id="f_fin"><input type="text" id="fech_fin" maxlength="10" name="fech_fin"/></div></td>
                </tr>
            </table>
            <br/>
            <table>
                <tr><td><input type="button" value="Guardar" id="btnsave" onclick="validar()"></td></tr>
            </table>
            <br/>
            <br/>
            <table class="ismtable">
                <thead>
                    <th>Año actual</th>
                    <th>Fecha inicial</th>
                    <th>Fecha final</th>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $regFecha->year_tmp ?></td>
                        <td><?php echo $regFecha->ini_tmp ?></td>
                        <td><?php echo $regFecha->fin_tmp ?></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
 </center>
<script src="js/DatePicker.js"></script>

 <script type="text/javascript">

    $(function() {
        $("#fech_inic").datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true
        });
    });

    $(function() {
        $("#fech_fin").datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true
        });
    });

    $(function(){
        $(document).on('change','#cmbYear', function(e){
            year_tmp = this.options[e.target.selectedIndex].text;
            $("#f_inic").load("controller/tmpAltaController.php?val=i&year="+year_tmp);
            $("#f_fin").load("controller/tmpAltaController.php?val=f&year="+year_tmp);
            //alert(year_tmp);
        });
    });

    function validar(){
        var year = $('#cmbYear').find(":selected").text();
        fech_inic = document.frmTmp.fech_inic.value;
        fech_fin = document.frmTmp.fech_fin.value;

        if (fech_inic.length == 0) {
            alert("Debe ingresar una fecha de inicio de temporada");
            document.frmTmp.fech_inic.focus();
            return;
        };

        if (year == "seleccionar") {
            alert('Debe seleccionar un año');
            document.frmTmp.cmbYear.focus();
            return;
        };

        if (fech_fin.length == 0) {
            alert("Debe ingresar una fecha de fin de temporada");
            document.frmTmp.fech_fin.focus();
            return;
        };

        $("#areaTrabajo").load("controller/tmpAltaController.php?val=guardar_fecha&year="+year+"&fech_inic="+fech_inic+"&fech_fin="+fech_fin);
    }
 </script>
<?php else: ?>
     <?php header("Location: http://192.168.1.4/contratos/index.php"); ?>
<?php endif ?>