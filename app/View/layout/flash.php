<?php if($flash):?>
<div class="alert alert-<?=htmlspecialchars($flash['type'])?> mb-4"><?=htmlspecialchars($flash['message'])?></div>
<?php endif;?>
