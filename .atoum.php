<?php
$runner->setBootstrapFile(__DIR__ . '/.bootstrap.atoum.php')
    ->addExtension(new Atoum\PraspelExtension\Manifest())
;

$coverageField = new atoum\report\fields\runner\coverage\html('Praspel', __DIR__ . '/tests/coverage');
$coverageField->setRootUrl('http://127.0.0.1');

$report = $script->addDefaultReport();
$report->addField($coverageField);
