<?php
    
    function calendario_mensual($mes,$key,$año){
        $dias=cal_days_in_month(CAL_GREGORIAN,$mes,$año);
        echo "<h1>$mes</h2>";
        echo "<table><tr><td>L</td><td>M</td><td>X</td><td>J</td><td>V</td><td>S</td><td>D</td></tr>";
        $dia=1;
        $x=1;
        
        while($dia<=$dias){
            $diaSemana=date("N",strtotime($año."-".$mes."-".$dia));
            if($x==1){
                echo "<tr>";
            }
            if(strval($diaSemana)==$x){
                echo "<td>$dia</td>";
                $dia++;
            } else{
                echo "<td></td>";
            }
            
            if($x==7){
                $x=0;
                echo "</tr>";
            }
            $x++;
        }
        echo "</table>";
    }

    function calendario_anual($año){
        for($mes=1;$mes<=12;$mes++){
            echo "<div class='mes'>";
            calendario_mensual($año,0,$mes);
            echo "</div>";
        }
    }

    function calendario_anual2($año){
        $meses=['1','2','3','4','5','6','7','8','9','10','11','12'];
         array_walk($meses,"calendario_mensual",$año);
    }

?>