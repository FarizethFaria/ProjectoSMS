<?php
session_start();
session_destroy(); //Destroi todas as sessões que estão conectadas
header('Location: index.php');
exit()
?>
