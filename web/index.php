<?php declare(strict_types=1);

namespace KL;

use GuzzleHttp\Client;
use KL\Http\Website;
use Siler\Dotenv as Env;
use function Siler\Container\inject;
use function Siler\Swoole\{http};

require_once __DIR__ . '/../vendor/autoload.php';

$api_client = new Client(['base_uri' => Env\env('API_URL')]);
inject(Client::class, $api_client);

$website = new Website(Env\bool_val('APP_DEBUG'));

$server = http($website, 8000);
$server->set([
    'enable_static_handler' => true,
    'document_root' => __DIR__ . '/static',
]);
$server->start();
