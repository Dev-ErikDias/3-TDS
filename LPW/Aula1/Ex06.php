<?php 
  $v = ["Yellow", "Blue", "Black", "Green", "Red", "Purple", "Gray", "Brown"];
  for($i = 1; $i <= 8; $i++){
    echo "<div style='background-color: $v[$i]; width: 100px; height: 100px;'></div>";
  }
