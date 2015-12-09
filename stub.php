<?php

Phar::mapPhar();
include 'phar://'. (include 'phar_name.php') .'/app.php';
__HALT_COMPILER();