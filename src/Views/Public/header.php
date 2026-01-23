<?php
echo "<header><div class='logo'>LegalHub</div><nav>
      <a href='dashboard' class='nav-button nav-link'>Home</a>";           
    if($_SESSION['role'] == "client"){
echo "<a href='avocats' class='nav-button logout'>Avocats</a>
        <a href='huissier' class='nav-button login'>Huissiers</a>
        <a href='Statistiques/checkUser' class='nav-button nav-link'>Statistics</a>
        <a href='client' class='nav-button nav-link'>Recherche</a>";
}elseif ($_SESSION['role'] == "admin") {
   echo "<a href='avocats' class='nav-button logout'>Avocats</a>
        <a href='huissier' class='nav-button login'>Huissiers</a>
        <a href='Statistiques/checkUser' class='nav-button nav-link'>Statistics</a>
        <a href='client' class='nav-button nav-link'>Recherche</a>";
}
else{
  echo " <a href='demandes/index' class='nav-button nav-link'>Demandes</a>
        <a href='demandes' class='nav-button nav-link'>client Demandes</a>
        <a href='history' class='nav-button nav-link'>client history</a>
        <a href='auth/logout' class='nav-button logout'>Logout</a>
        <a href='demandes/goToCalendar' class='nav-button nav-link'>Full Calender</a>";
   }
   echo "<a href='auth/logout' class='nav-button logout'>Logout</a></nav></header>";
   ?>
