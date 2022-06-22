<?php
session_start();

include("./model/_C-Rewriter.php");
$rew = new Rewriter(array());
?>
<!DOCTYPE html>
<html>
    <?php
        $rew->drawHead();
    ?>
    <body>
        
    </body>
</html>