<?php declare(strict_types=1);

namespace KL;

use KL\Database\Pdo;
use KL\Http\Api;
use Siler\Dotenv as Env;
use function Siler\Container\inject;
use function Siler\Swoole\{http};

require_once __DIR__ . '/../vendor/autoload.php';

$db = new Pdo(new \PDO(Env\env('MYSQL_DSN'), Env\env('MYSQL_USER'), Env\env('MYSQL_PASSWORD')));
inject(Database::class, $db);

$api = new Api();
http($api, 8001)->start();

