<?php

use App\Controllers\Mail;
use App\Models\CommandeForfait;
use App\Models\MessageContact;
use App\Models\Messages;
use Database\DBConnection;

require  '../vendor/autoload.php';

$db =new DBConnection();
$commande =new CommandeForfait($db);

$maile =new Mail("nouveau compte client");
$content ="<h1 style='color:blue'>NOUVEAU CLIENT ENREGISTRER</h1>
<p>nom: <strong>{name}</strong> </p>
<p>ville: <strong>{ville}</strong> </p>
<p>numero: <strong>{number}</strong> </p>
<p>mail: <strong>{mail}</strong> </p>
";
$maile->externalEmail("nganjienzatsi@gmail.com");
$maile->htmlEmail($content);
$maile->send();
?>