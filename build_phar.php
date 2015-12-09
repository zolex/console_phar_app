<?php

chdir(dirname(__FILE__));

`rm -rf build && mkdir build`;
`rm -rf bin && mkdir bin`;
`cp luke.php build`;
`cp -R src build`;
`cp -R vendor build`;

$phar = new Phar('bin/luke.phar', 0, 'luke.phar');
$phar->buildFromDirectory('build');
$phar->setStub(file_get_contents("stub.php"));

`rm -rf build`;