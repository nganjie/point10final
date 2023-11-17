<header class="header_wrapper">
      <!-- menu for small vp -->
      <nav aria-label="mobile-menu" id="mobile-menu" class="mobile-menu-close">
        <div class="close_mobile_section">
          <button class="close_btn"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <ul class="lisy_menu_item">
          <li>
            <a href="index.html">Accueil</a>
          </li>
          <li>
            <a href="contacts.html">Contact</a>
          </li>

          <li>
            <a href="forfaits.html">Nos forfaits</a>
          </li>

          <li>
            <a href="se_connecter.html"></a>
          </li>
          <li>
            <a href="creer_compte.html"></a>
          </li>

          <li class="user_dashbord_link">
            <a href="">
              <i class="fa-solid fa-user"></i>
              <span>Ivan</span>
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
          <li class="active_nav_item">
            <a href="#contact">Accueil</a>
          </li>
          <li>
            <a href="<?= SCRIPTS ?>../contacts">Contact</a>
          </li>

          <li>
            <a href="<?= SCRIPTS ?>../forfait">Nos forfaits</a>
          </li>

          <li>
            <a href="<?= SCRIPTS ?>../creer-compte">S'incrire</a>
          </li>
          <li>
            <a href="<?= SCRIPTS ?>../se-connecter">Se connecter</a>
          </li>
          <li class="user_dashbord_link">
            <a href="dasnord_client.html">
              <i class="fa-solid fa-user"></i>
              <span>Ivan</span>
            </a>
          </li>
        </ul>

        <button class="open_btn"><i class="fa-solid fa-bars"></i></button>
      </nav>
    </header>