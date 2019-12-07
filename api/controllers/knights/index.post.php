<?php declare(strict_types=1);

namespace KL;

use function Siler\Container\retrieve;
use function Siler\Encoder\Json\decode;
use function Siler\Swoole\json;
use function Siler\Swoole\raw;

/** @var Database $db */
$db = retrieve(Database::class);

return function () use ($db): void {
    $input = decode(raw());

    if (empty($input['name'])) {
        json(['error' => true, 'message' => 'Knights must have a name'], 422);
        return;
    }

    $knight = new Knight();
    $knight->name = $input['name'];
    $knight->id = $db->saveKnight($knight);

    json(['error' => false, 'data' => $knight], 201);
};
