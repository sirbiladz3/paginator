<?php

use App\Pagination\Builder;
use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;

require_once 'vendor/autoload.php';

$config = new Configuration();

$connection = DriverManager::getConnection([
    'dbname' => 'paginator',
    'user' => 'root',
    'password' => '',
    'host' => '127.0.0.1',
    'driver' => 'pdo_mysql'
]);

$queryBuilder = $connection->createQueryBuilder();
$queryBuilder->select('*')->from('users');

$builder = new Builder($queryBuilder);
$users = $builder->paginate($_GET['page'] ?? 1, 10);

foreach ($users->get() as $user) {
    echo $user['id'] . ': ' . $user['first_name'] . '<br>';
}

echo $users->render([
    'order' => $_GET['order'],
    'abc' => $_GET['abc']
    ]);
