<?php
if (!empty($flash) && !empty($flash['message'])):
$type = $flash['type'] ?? 'success';
$icon = 'bi-info-circle';

if ($type === 'success') {
  $icon = 'bi-check-circle';
} elseif ($type === 'danger' || $type === 'error') {
  $type = 'danger';
  $icon = 'bi-exclamation-triangle';
} elseif ($type === 'warning') {
  $icon = 'bi-exclamation-triangle';
}
?>
<div class="flash-wrapper border-bottom mb-3">
  <div class="container py-2">
    <div class="alert alert-<?=htmlspecialchars((string)$type)?> d-flex align-items-center mb-0" role="alert">
      <i class="bi <?=htmlspecialchars((string)$icon)?> me-2"></i>
      <div class="flex-grow-1">
        <?=htmlspecialchars((string)$flash['message'])?>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
