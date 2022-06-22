<?php
session_start();

include("./model/_C-Rewriter.php");
$rew = new Rewriter(array());
?>
<!DOCTYPE html>
<html>
    <?php
        echo $rew->drawHead();
    ?>
    <body>
        <?php echo $rew->init(); ?>
    </body>
</html>