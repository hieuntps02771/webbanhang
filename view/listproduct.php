<?php
include "../view/header.php";
        echo '<div class="container-fluid">';
        $i=1;
        foreach ($result as $value){
            
            if($i==1||$i==4){echo'<div class="row">';}
            echo '
                    
                        <div class="col-md-4">
                        <div class="containZoom">
                            <a href="?action=chi-tiet-san-pham&id='.$value[0].'"><img class="img-responsive zoom" src="../control/images/products/'.$value[2].'"></a></div><div>
                        <p style="text-align:center;">'.$value[1].'</p>
                        <p style="text-align:center;">'.number_format($value[3],0).'VNĐ</p>
                        </div>
                        </div>';                        
                    
                
            if($i==3||$i==6){echo '</div>';}
            $i++;
        }
        echo '<div class="huy"></div>';
        echo '<div class="row">';
        echo '<div class=col-md-4></div>';
        echo '<div class=col-md-4>';
        echo '<ul class="pagination phantrang">';
        for ($t=1;$t<=$sotrang;$t++){
            echo '<li><a href="?action='.$actionfirst.'&page='.$t.'">'.$t.'</a></li>';
        }
        echo '</ul>';
        echo '</div>';
        echo '<div class=col-md-4></div>';
        echo '</div>';//row
        echo '</div>';
        
?>

