<?php
require('database.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Fichaxe</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link href="css/style.css" type="text/css" rel="stylesheet" />
  <script src="js/comprobeForm.js"></script>
</head>
<body>
  <div>
    <div>
      <h2>Revisar</h2>
    </div>
    <div class='fleft'>
      <h4>Revisar 1 docente por Datas</h4>
      <FORM method='POST' name='form1' onSubmit='return comprobeForm(this)' class='bdashed'> 
        <div>
          <INPUT type='hidden' name='fichaxeF1' value='unDocente'>
          <SELECT name='user' class='form-control'>
            <p class='cblack;'>
            <?php
              $sql="SELECT DISTINCT name FROM My_college.teachers";
              $rows=$connection->query($sql);
              $selectOptions="<OPTION value=''>Seleccione usuario</OPTION>";
              while($row=$rows->fetch_array()):
                $SELECTED=($row[0]=='')?'SELECTED':'';
                $selectOptions.="<OPTION value='{$row[0]}' $SELECTED>{$row[0]}</OPTION>\n";
              endwhile; 
              echo $selectOptions;
            ?>
            </p>
          </SELECT><br>
          <INPUT TYPE='date' name='dataHomeF1' class='form-control'><br>
          <INPUT TYPE='date' name='dataEndF1' class='form-control'>
        </div>
        <div>
        <button type='submit'>Elixir</button>
        </div>
      </FORM>
    </div>

    <div class='fleft mleft80'>
      <h4>Revisar a fichaxe o Día elixido</h4>
      <FORM method='POST' name='form2' onSubmit='return comprobeForm2(this)' class='bdashed'> 
        <div>
          <INPUT type='hidden' name='fichaxeF2' value='porData'>
          <INPUT TYPE='date' name='dataHomeF2' class='form-control'>
        </div>
        <div>
        <button type='submit'>Elixir</button>
        </div>
      </FORM>
    </div>

    <div class='fleft mleft80'>
      <h4>Revisar a fichaxe por Datas</h4>
      <FORM method='POST' name='form3' onSubmit='return comprobeForm3(this)' class='bdashed'> 
        <div>
          <INPUT type='hidden' name='fichaxeF3' value='porDatas'>
          <INPUT TYPE='date' name='dataHomeF3' class='form-control'><br>
          <INPUT TYPE='date' name='dataEndF3' class='form-control'>
        </div>
        <div>
        <button type='submit'>Elixir</button>
        </div>
      </FORM>
    </div>


    <?php
    if(isset($_POST['user']) AND $_POST['fichaxeF1']=='unDocente') {
      $par=0;
      $user=$_POST['user'];
      $dataHome=$_POST['dataHomeF1'];
      $dataEnd=$_POST['dataEndF1'];
      $sql = "SELECT DISTINCT name FROM My_college.teachers WHERE name='$user'";
      $filas=$connection->query($sql);
      if($fila=$filas->fetch_assoc()){
        $name=$fila['name'];
      ?>
     
      <div class='cboth mtop'>&nbsp;</div>
      <hr class='cboth bdhr'>
      <div class='fleft'>
        <h3>Fichaxe</h3>
        <p class='font3'>I.E.S. ...</p>
        <table width='400' height="14" valign="middle"  border="1">
          <tr>
            <th align="center" valign="middle"  bgcolor="#f0f0f0" colspan="4" class='tcenter'><span class='font4'><i><?=$name;?></i></span></th>
          </tr>
          <tr>
            <td align="center" valign="middle"  bgcolor="#f0f0f0"><span class='font3'><b>DATA</b></span></td>
            <td align="center" valign="middle"  bgcolor="#f0f0f0"><span class='font3'><b>D&iacute;a</b></span></td>
            <td align="center" valign="middle"  bgcolor="#f0f0f0"><span class='font3'><b>Ma&ntilde;&aacute; (<15h)</b></span></td>
            <td align="center" valign="middle"  bgcolor="#f0f0f0"><span class='font3'><b>Tarde (>15h)</b></span></td>
          </tr>
        <?php
        }
        $sql = "SELECT name, date, morning, evening FROM My_college.teachers WHERE name='$user' AND date BETWEEN '$dataHome' AND '$dataEnd'";
        $filas=$connection->query($sql);
        while($fila=$filas->fetch_assoc()){
          $name=$fila['name'];
          $date=$fila['date'];
          $morning=$fila['morning'];
          if ($morning == '00:00:00') {
            $morning='---';
          }
          $evening=$fila['evening'];
          if ($evening == '00:00:00') {
            $evening='---';
          }
          $dias = array('Luns','Martes','Mércores','Xoves','Venres','Sábado','Domingo');
          $dia = $dias[(date('N', strtotime($date))) - 1];
          if ($par%2==1){
            $bg='background-color:#eef0f0;';
          }else{
            $bg='background-color:#fff;';       
          }
        ?>
          <tr style='<?=$bg;?>'>
            <td align="center" valign="middle"><span class='font2'><?php echo $date;?></span></td>
            <td align="center" valign="middle"><span class='font2'><?php echo $dia;?></span></td>
            <td align="center" valign="middle"><span class='font2'><?php echo $morning;?></span></td>
            <td align="center" valign="middle"><span class='font2'><?php echo $evening;?></span></td>
          </tr>
        <?php
          $par++;
        }
        ?>
        </table>
        <br />
      </div>
    </div>
    <?php
      }
    ?>

    <?php
    if(isset($_POST['dataHomeF2']) AND $_POST['fichaxeF2']=='porData') {
      $par=0;
      $dataHome=$_POST['dataHomeF2'];
    ?>
     
      <div class='cboth mtop'>&nbsp;</div>
      <hr class='cboth bdhr'>
      <div class='fleft'>
        <h3>Fichaxe</h3>
        <p><span class='font3'>I.E.S. ...</font></p>
        <table width='600' height="14" valign="middle"  border="1">
          <tr>
            <td align="center" valign="middle"  bgcolor="#f0f0f0"><span class='font3'><b>Docente</b></span></td>
            <td align="center" valign="middle"  bgcolor="#f0f0f0"><span class='font3'><b>DATA</b></span></td>
            <td align="center" valign="middle"  bgcolor="#f0f0f0"><span class='font3'><b>D&iacute;a</b></span></td>
            <td align="center" valign="middle"  bgcolor="#f0f0f0"><span class='font3'><b>Ma&ntilde;&aacute; (<15h)</b></span></td>
            <td align="center" valign="middle"  bgcolor="#f0f0f0"><span class='font3'><b>Tarde (>15h)</b></span></td>
          </tr>
        <?php
        $sql = "SELECT DISTINCT name, date, morning, evening FROM My_college.teachers WHERE date = '$dataHome'";
        $filas=$connection->query($sql);
        while($fila=$filas->fetch_assoc()){
          $name=$fila['name'];
          $date=$fila['date'];
          $morning=$fila['morning'];
          if ($morning == '00:00:00') {
            $morning='---';
          }
          $evening=$fila['evening'];
          if ($evening == '00:00:00') {
            $evening='---';
          }
          $dias = array('Luns','Martes','Mércores','Xoves','Venres','Sábado','Domingo');
          $dia = $dias[(date('N', strtotime($date))) - 1];
          if ($par%2==1){
            $bg='background-color:#eef0f0;';
          }else{
            $bg='background-color:#fff;';       
          }
        ?>
          <tr style='<?=$bg;?>'>
            <td align="center" valign="middle"><span class='font2'><?php echo "$name";?></span></td>
            <td align="center" valign="middle"><span class='font2'><?php echo $date;?></span></td>
            <td align="center" valign="middle"><span class='font2'><?php echo $dia;?></span></td>
            <td align="center" valign="middle"><span class='font2'><?php echo $morning;?></span></td>
            <td align="center" valign="middle"><span class='font2'><?php echo $evening;?></span></td>
          </tr>
        <?php
          $par++;
        }
        ?>
        </table>
      </div>
     <?php
      }
    ?>

    <?php
    if(isset($_POST['dataEndF3']) AND $_POST['fichaxeF3']=='porDatas') {
      $par=0;
      $dataHome=$_POST['dataHomeF3'];
      $dataEnd=$_POST['dataEndF3'];
    ?>
     
      <div class='cboth mtop'>&nbsp;</div>
      <hr class='cboth bdhr'>
      <div class='fleft'>
        <h3>Fichaxe</h3>
        <p><span class='font3'>I.E.S. ...</font></p>
        <table width='600' height="14" valign="middle"  border="1">
          <tr>
            <td align="center" valign="middle"  bgcolor="#f0f0f0"><span class='font3'><b>Docente</b></span></td>
            <td align="center" valign="middle"  bgcolor="#f0f0f0"><span class='font3'><b>DATA</b></span></td>
            <td align="center" valign="middle"  bgcolor="#f0f0f0"><span class='font3'><b>D&iacute;a</b></span></td>
            <td align="center" valign="middle"  bgcolor="#f0f0f0"><span class='font3'><b>Ma&ntilde;&aacute; (<15h)</b></span></td>
            <td align="center" valign="middle"  bgcolor="#f0f0f0"><span class='font3'><b>Tarde (>15h)</b></span></td>
          </tr>
        <?php
        $sql = "SELECT DISTINCT name, date, morning, evening FROM My_college.teachers WHERE date BETWEEN '$dataHome' AND '$dataEnd'";
        $filas=$connection->query($sql);
        while($fila=$filas->fetch_assoc()){
          $name=$fila['name'];
          $date=$fila['date'];
          $morning=$fila['morning'];
          if ($morning == '00:00:00') {
            $morning='---';
          }
          $evening=$fila['evening'];
          if ($evening == '00:00:00') {
            $evening='---';
          }
          $dias = array('Luns','Martes','Mércores','Xoves','Venres','Sábado','Domingo');
          $dia = $dias[(date('N', strtotime($date))) - 1];
          if ($par%2==1){
            $bg='background-color:#eef0f0;';
          }else{
            $bg='background-color:#fff;';       
          }
        ?>
          <tr style='<?=$bg;?>'>
            <td align="center" valign="middle"><span class='font2'><?php echo "$name";?></span></td>
            <td align="center" valign="middle"><span class='font2'><?php echo $date;?></span></td>
            <td align="center" valign="middle"><span class='font2'><?php echo $dia;?></span></td>
            <td align="center" valign="middle"><span class='font2'><?php echo $morning;?></span></td>
            <td align="center" valign="middle"><span class='font2'><?php echo $evening;?></span></td>
          </tr>
        <?php
          $par++;
        }
        ?>
        </table>
      </div>
     <?php
      }
    ?>
  </div> 
  <div class='cboth mtop'>&nbsp;</div>
</body>
</html>
