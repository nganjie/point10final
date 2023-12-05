<?php

use App\Controllers\AlertModification;
?>
<nav class="sidebar">
        <div
          style="
            border-bottom: 1px solid white;
            padding-bottom: 1rem !important;
          "
        >
          <h1>Point10recharge</h1>
        </div>
        <ul class="list_nav">
          <li class=""><a href="<?= SCRIPTS ?>../admin/dashbord">Dashbord</a></li>
          
          <li >
            <a href="<?= SCRIPTS ?>../admin/commandes">Commandes en cours </a>
            <span class="notification-label notification-label-red" id="notif"><?= AlertModification::checkNewCommande()?></span>
          </li>
          <li >
            <a href="<?= SCRIPTS ?>../admin/messages_contact">
              <i class="fa fa-envelope"></i>
              <span>Messages Contacts</span>
            </a>
            <!--<span class="notification-label notification-label-red" ></span>-->
          </li>

          <li>
            <a href="<?= SCRIPTS ?>../admin/messages">
              <i class="fa fa-envelope"></i>
              <span>Messages</span>
            </a>
            <!--<span class="notification-label notification-label-red"></span>-->
          </li>
        </ul>
      </nav>