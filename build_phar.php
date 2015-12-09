<?php

chdir(dirname(__FILE__));

`rm -rf build && mkdir build`;
`rm -rf bin && mkdir bin`;
`cp app.php build`;
`cp -R src build`;
`cp -R vendor build`;

$pharName = (include 'phar_name.php');
$phar = new Phar('bin/'. $pharName, 0, $pharName);
$phar->buildFromDirectory('build');
$phar->setStub(file_get_contents("stub.php"));

`rm -rf build`;