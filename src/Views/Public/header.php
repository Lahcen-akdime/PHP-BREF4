<!-- // $user;
// //   if($_SESSION['user']){
// //        $user ="User";
// //   }else
//  if($_SESSION['admin']){
//        $user ="Admin";
    
//   }else if($_SESSION['avocat']){
//        $user ="Avocat";
    
//   }else if($_SESSION['huissier']){
//        $user ="Huissier";
    
//   } -->
<header>
    <div class="logo">LegalHub</div>
    <nav>
        <?php
        if (isset($_SESSION['role']) && $_SESSION['role'] === 'client') {
        ?>
            <a href="/PHP-BREF4/client" class="nav-button nav-link">Home</a>
            <a href="/PHP-BREF4/client/history" class="nav-button nav-link">client history</a>
            <a href="/PHP-BREF4/auth/logout" class="nav-button logout">Logout</a>
        <?php
        }
        ?>

        <?php
        if (isset($_SESSION['role']) && ($_SESSION['role'] === 'avocat' || $_SESSION['role'] === 'huissier')) {
        ?>
            <a href="/PHP-BREF4/avocats" class="nav-button logout">Avocats</a>
            <a href="/PHP-BREF4/huissier" class="nav-button login">Huissiers</a>
            <a href="/PHP-BREF4/Statistiques/checkUser" class="nav-button nav-link">Statistics</a>
            <a href='demandes/goToCalendar' class='nav-button nav-link'>Full Calender</a>

            <a href="/PHP-BREF4/client/s" class="nav-button nav-link">Demandes</a>
        <?php
        }
        ?>
    </nav>
</header>
