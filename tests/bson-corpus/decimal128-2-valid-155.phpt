--TEST--
Decimal128: [decq022] Normality
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/tools.php';

$bson = hex2bin('18000000136400C7711CC7B548F377DC80A131C836403000');

// BSON to Canonical BSON
echo bin2hex(fromPHP(toPHP($bson))), "\n";

// BSON to Canonical extJSON
echo json_canonicalize(toExtendedJSON($bson)), "\n";

$json = '{"d" : {"$numberDecimal" : "1111111111111111111111111111111111"}}';

// extJSON to Canonical extJSON
echo json_canonicalize(toExtendedJSON(fromJSON($json))), "\n";

// extJSON to Canonical BSON
echo bin2hex(fromJSON($json)), "\n";

?>
===DONE===
<?php exit(0); ?>
--EXPECT--
18000000136400c7711cc7b548f377dc80a131c836403000
{"d":{"$numberDecimal":"1111111111111111111111111111111111"}}
{"d":{"$numberDecimal":"1111111111111111111111111111111111"}}
18000000136400c7711cc7b548f377dc80a131c836403000
===DONE===