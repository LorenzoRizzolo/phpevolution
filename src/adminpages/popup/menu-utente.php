<div class="menu-inline">

<?php

echo "<a title='visualizza' href='?page=".$_GET['page']."&utente=".$s['id']."&mod=visualizza'> <i class='fa-regular fa-rectangle-list'></i></a>";

echo "<a title='elimina' href='?page=".$_GET['page']."&utente=".$s['id']."&mod=elimina' ><i class='fa-regular fa-trash-can'></i></a>";

echo "<a title='modifica' href='?page=".$_GET['page']."&utente=".$s['id']."&mod=modifica' ><i class='fa-regular fa-pen-to-square'></i></a>";

?>

</div>