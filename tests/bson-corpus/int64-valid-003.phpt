--TEST--
Int64 type: -1
--XFAIL--
PHP encodes integers as 32-bit if range allows
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/tools.php';

$bson = hex2bin('10000000126100FFFFFFFFFFFFFFFF00');

// BSON to Canonical BSON
echo bin2hex(fromPHP(toPHP($bson))), "\n";

// BSON to Canonical extJSON
echo json_canonicalize(toExtendedJSON($bson)), "\n";

$json = '{"a" : {"$numberLong" : "-1"}}';

// extJSON to Canonical extJSON
echo json_canonicalize(toExtendedJSON(fromJSON($json))), "\n";

// extJSON to Canonical BSON
echo bin2hex(fromJSON($json)), "\n";

?>
===DONE===
<?php exit(0); ?>
--EXPECT--
10000000126100ffffffffffffffff00
{"a":{"$numberLong":"-1"}}
{"a":{"$numberLong":"-1"}}
10000000126100ffffffffffffffff00
===DONE===