<?php declare(strict_types=1);

namespace KL\Api\Knights;

use KL\Database;
use function Siler\Container\retrieve;
use function Siler\Swoole\json;

/** @var Database $db */
$db = retrieve(Database::class);

return function () use ($db) {
    $knights = $db->findKnights();
    json(['error' => false, 'data' => $knights]);
};
