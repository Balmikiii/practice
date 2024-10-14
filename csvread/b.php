<?php
  $datastored = [];
  $file = fopen("employees.csv", "r"); 
  while (($data = fgetcsv($file,1000,",")) !==FALSE) { 
      $datastored[] = $data;
  } 
  fclose($file); 
  $q = $_REQUEST["q"];
  
  $val = [];
  $val1 = [];
  $arrayuniqie = [];
  
  if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    $pattern = "/".$q."/i";
    foreach($datastored as $name){
      if (preg_match($pattern, $name[0])) {
        if (!empty($name[0])){
          $val[] = $name[0];
          $val1[] = $name[2];
          if (!array_search($name[0],$arrayuniqie)){
            $arrayuniqie[] = $name[0];
            $arrayuniqie1[] = $name[2];
          }
        }
      }
    }
  }
  echo "<div class='withname'><table id='tabb'>";
  echo "<caption>CSV Files Data</caption>";
  for ($i=0; $i<1; $i++){
    echo "<tr><th>Sr no.</th>";
          for ($j=0; $j<count($datastored[$i]); $j++){
              echo "<th>".$datastored[$i][$j]."</th>";
          }
      echo "</tr>";
  }
  $run = 0; // per page 10 datas
  
  for ($k=0; $k<count($arrayuniqie); $k++){
    for ($i=1; $i<count($datastored); $i++){
      for ($j=0; $j<count($datastored[$i]); $j++){
          if (($datastored[$i][0]==$val[$k])&&($datastored[$i][2]==$val1[$k])){
            if($run<80){
              if ($j==0){
                echo "<tr><td>$i</td>";
              }
              if ($j==3){
                echo "<td>".date("h:i A", strtotime($datastored[$i][$j]))."</td>";
              }else{
                  echo "<td>".str_ireplace($q,"<mark>".$q."</mark>",$datastored[$i][$j])."</td>";
              }
            }
            $run +=1;
          }
        }
      echo "</tr>";
    }
  }
  echo "</table>";
  echo "<div class=pagejump>
    <div class='pagination'>";
    for ($i=0; $i<count($arrayuniqie)*8; $i++){
      if ($i%80==0){
        if ($i/80==0){
          continue;
        }
        if (($i/80)<6){
          echo "<a href=index.php?qr=".$q."&pages=".($i/80)."><button>".($i/80)."</button></a>";
        }
        else if(($i/80)>floor(count($arrayuniqie)/8)-6){
          echo "<a href=index.php?qr=".$q."&pages=".($i/80)."><button>".($i/80)."</button></a>";
        }
        else{
          echo "<a href=index.php?qr=".$q."&pages=".($i/80)."><button>.</button></a>";
        }
        }
    }
    echo "</div><br>";
?>