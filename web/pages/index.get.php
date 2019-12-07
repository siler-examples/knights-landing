<?php declare(strict_types=1);

namespace KL;

use GuzzleHttp\Client;
use Siler\Twig;
use function Siler\Container\retrieve;
use function Siler\Encoder\Json\decode;
use function Siler\Swoole\emit;

/** @var Client $api */
$api = retrieve(Client::class);

return function () use ($api) {
    $response = $api->get('/knights');
    $response = $response->getBody()->getContents();
    $response = decode($response);

    $html = Twig\render('home.twig', ['knights' => $response['data']]);
    emit($html);
};
