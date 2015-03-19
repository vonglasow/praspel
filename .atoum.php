<?php
$runner->setBootstrapFile(__DIR__ . '/.bootstrap.atoum.php')
    ->addExtension(new Atoum\PraspelExtension\Manifest())
;

$coverageField = new atoum\report\fields\runner\coverage\html('Praspel', __DIR__ . '/tests/coverage');
$coverageField->setRootUrl('file://'.__DIR__.'/tests/coverage/index.html');

$report = $script->addDefaultReport();
$report->addField($coverageField);
