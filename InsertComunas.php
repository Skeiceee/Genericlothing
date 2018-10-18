<?php
echo('<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">');
  $jsondata = file_get_contents('comunas.json');
echo('<div class="form-group">');
  $data = json_decode($jsondata, true);
  echo('<select class="form-control col-lg-5 col-sm-5 col-md-5 mx-auto mt-4" name="comunas">');
  foreach($data as $row){
    $region = ($row);
    foreach($region as $row){
      $comuna = $row['comunas'];
      $region = $row['region'];
      echo('<option value="'.$region.'" disabled>'.'--'.$region.'--</option>');
      foreach($comuna as $row){
        echo('<option value="'.$row.'">'.$row.'</option>');
      }
    }
  }
  echo('</select>');
echo('</div>');
?>
