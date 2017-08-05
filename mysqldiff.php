<?php

/**
 * ceshi
 */

$conf = [
    'master' => [
        'host' => '127.0.0.1',
        'user' => 'root',
        'pwd' => 'root',
        'db' => 'demo1',
    ],
    'slave' => [
        'host' => '127.0.0.1',
        'user' => 'root',
        'pwd' => 'root',
        'db' => 'demo2',
    ],
];


$md = new MysqlDiff($conf);
$md->$conn;
echo "<pre>";
echo dump($md->$conn);
echo "</pre>";
die();
$md->run();

list($success_add_tables, $error_add_tables) = $md->getAddTables();
list($success_repair_tables, $error_repair_tables) = $md->getRepairTables();

echo sprintf("Success add tables:\t%s\n", implode(',', $success_add_tables));
echo sprintf("Error add tables:\t%s\n", implode(',', $error_add_tables));

echo sprintf("Success repair tables:\t%s\n", implode(',', $success_repair_tables));
echo sprintf("Error repair tables:\t%s\n", implode(',', $error_repair_tables));