<h1>show n .. </h1>
<?php foreach($params['forfait'] as $forfait): ?>
<div>
 <p><?= $forfait->content?></p>
</div>
<?php endforeach ?>