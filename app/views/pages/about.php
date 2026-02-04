<?php require APPROOT . '/views/inc/header.php'; ?>

  <h1><?php echo h($data['title']); ?></h1>
  
  <p><?php echo h($data['description']); ?></p>
  
  <p>Version: <strong><?php echo h(APPVERSION); ?></strong></p>

<?php require APPROOT . '/views/inc/footer.php'; ?>