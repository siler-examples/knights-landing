<?php declare(strict_types=1);

namespace KL\Http;

use Siler\Route;
use Siler\Swoole;
use Swoole\Http\Request;
use Swoole\Http\Response;

class Api
{
    public function __invoke(Request $request, Response $response): void
    {
        Swoole\cors();
        Route\files(__DIR__ . '/../../api/controllers');
    }
}
