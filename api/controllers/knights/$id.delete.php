<?php declare(strict_types=1);

namespace KL\Http\Delete;

use KL\Database;
use function Siler\Container\retrieve;
use function Siler\Swoole\json;

/** @var Database $db */
$db = retrieve(Database::class);

return function (array $params) use ($db) {
    $deleted = $db->deleteKnightById(intval($params['id']));
    json(['error' => !$deleted, 'message' => "Deleted $deleted"]);
};
