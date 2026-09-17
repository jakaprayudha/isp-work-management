
<?php

/**
 * Device Router
 * Mobile  -> mobile/index
 * Desktop -> web/index
 */

$userAgent = $_SERVER['HTTP_USER_AGENT'] ?? '';

$isMobile = preg_match(
   '/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini|Mobile/i',
   $userAgent
);

if ($isMobile) {
   header('Location: mobile/index');
   exit;
}

header('Location: web/index');
exit;
