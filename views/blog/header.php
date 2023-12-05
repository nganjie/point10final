
    <header class="header_wrapper">
      <!-- menu for small vp -->
      <nav aria-label="mobile-menu" id="mobile-menu" class="mobile-menu-close">
        <div class="close_mobile_section">
          <button class="close_btn"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <ul class="lisy_menu_item">
          
          <li class="<?=$actif=="index"?"active_nav_item":""?>">
            <a href="<?= SCRIPTS ?>../">Accueil</a>
          </li>
          <li class="<?=$actif=="contact"?"active_nav_item":""?>">
            <a href="<?= SCRIPTS ?>../contacts">Contact</a>
          </li>

          <li class="<?=$actif=="forfait"?"active_nav_item":""?>">
            <a href="<?= SCRIPTS ?>../forfait">Nos forfaits</a>
          </li>

          <?php if(!est_connecter()){
            echo "<li>
            <a href=".SCRIPTS."../creer-compte>S'incrire</a>
          </li>
          <li>
            <a href=".SCRIPTS."../se-connecter>Se connecter</a>
          </li>";
          }else echo "<li>
          <a href=".SCRIPTS."../deconnexion>Deconnexion</a>
        </li>";?>
          

          <li class="user_dashbord_link" <?php if(!est_connecter()) echo "style='display:none'";?>>
            <a href="dashbord-client">
              <i class="fa-solid fa-user"></i>
              <span><?php if(est_connecter()){echo $_SESSION['nom'];}else{echo"nom";}?></span>
            </a>
          </li>
        </ul>

        <div class="logo_sect_mobile">
          <a href="index.html"
            ><img
              src="<?= SCRIPTS ?>../media/logo-point10final.png"
              alt="logo de point10recharge"
          /></a>
          <div class="social_icon">
            <a href="#"><i class="fa-brands fa-facebook"></i></a>
            <a href="#"><i class="fa-brands fa-twitter"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
          </div>
        </div>
      </nav>
      <!-- main site menu -->
      <nav id="nav_wrap">
        <a href="/"
          ><img
            src="<?= SCRIPTS ?>../media/logo-point10final.png"
            alt="logo de point10recharge"
        /></a>

        <ul class="nav_wrap_list">
        <li class="<?=$actif=="index"?"active_nav_item":""?>">
            <a href="<?= SCRIPTS ?>../">Accueil</a>
          </li>
          <li class="<?=$actif=="contact"?"active_nav_item":""?>">
            <a href="<?= SCRIPTS ?>../contacts">Contact</a>
          </li>

          <li class="<?=$actif=="forfait"?"active_nav_item":""?>">
            <a href="<?= SCRIPTS ?>../forfait">Nos forfaits</a>
          </li>

          <?php if(!est_connecter()){
            echo "<li>
            <a href=".SCRIPTS."../creer-compte>S'incrire</a>
          </li>
          <li>
            <a href=".SCRIPTS."../se-connecter>Se connecter</a>
          </li>";
          }else echo "<li>
          <a href=".SCRIPTS."../deconnexion>Deconnexion</a>
        </li>";?>
          <li class="user_dashbord_link" <?php if(!est_connecter()) echo "style='display:none'";?>>
            <a href="dashbord-client">
              <i class="fa-solid fa-user"></i>
              <span><?php if(est_connecter()){echo $_SESSION['nom'];}else{echo"nom";}?></span>
            </a>
          </li>
        </ul>

        <button class="open_btn"><i class="fa-solid fa-bars"></i></button>
      </nav>
    </header>