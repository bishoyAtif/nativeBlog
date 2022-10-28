<?php

return [
    'name' => 'My Project Migrations',
    'migrations_namespace' => 'MyProject\Migrations',
    'table_name' => 'migrations',
    'column_name' => 'version',
    'column_length' => 14,
    'executed_at_column_name' => 'executed_at',
    'migrations_directory' => __DIR__ . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR . 'migrations',
    'all_or_nothing' => true,
    'check_database_platform' => true,
];
