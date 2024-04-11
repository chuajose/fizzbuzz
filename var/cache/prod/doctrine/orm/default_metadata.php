<?php

// This file has been auto-generated by the Symfony Cache Component.

return [[

'App__Domain__FizzBuzz__Model__FizzBuzz__CLASSMETADATA__' => 0,

], [

0 => static function () {
    return \Symfony\Component\VarExporter\Internal\Hydrator::hydrate(
        $o = [
            clone (($p = &\Symfony\Component\VarExporter\Internal\Registry::$prototypes)['Doctrine\\ORM\\Mapping\\ClassMetadata'] ?? \Symfony\Component\VarExporter\Internal\Registry::p('Doctrine\\ORM\\Mapping\\ClassMetadata')),
            clone ($p['Doctrine\\ORM\\Mapping\\FieldMapping'] ?? \Symfony\Component\VarExporter\Internal\Registry::p('Doctrine\\ORM\\Mapping\\FieldMapping')),
            clone $p['Doctrine\\ORM\\Mapping\\FieldMapping'],
            clone $p['Doctrine\\ORM\\Mapping\\FieldMapping'],
            clone $p['Doctrine\\ORM\\Mapping\\FieldMapping'],
            clone $p['Doctrine\\ORM\\Mapping\\FieldMapping'],
            clone ($p['Symfony\\Bridge\\Doctrine\\IdGenerator\\UuidGenerator'] ?? \Symfony\Component\VarExporter\Internal\Registry::p('Symfony\\Bridge\\Doctrine\\IdGenerator\\UuidGenerator')),
            clone ($p['Symfony\\Component\\Uid\\Factory\\UuidFactory'] ?? \Symfony\Component\VarExporter\Internal\Registry::p('Symfony\\Component\\Uid\\Factory\\UuidFactory')),
        ],
        null,
        [
            'stdClass' => [
                'namespace' => [
                    'App\\Domain\\FizzBuzz\\Model',
                ],
                'rootEntityName' => [
                    'App\\Domain\\FizzBuzz\\Model\\FizzBuzz',
                ],
                'customGeneratorDefinition' => [
                    [
                        'class' => 'Symfony\\Bridge\\Doctrine\\IdGenerator\\UuidGenerator',
                    ],
                ],
                'identifier' => [
                    [
                        'id',
                    ],
                ],
                'generatorType' => [
                    7,
                ],
                'fieldMappings' => [
                    [
                        'begin' => $o[1],
                        'last' => $o[2],
                        'createdAt' => $o[3],
                        'result' => $o[4],
                        'id' => $o[5],
                    ],
                ],
                'fieldNames' => [
                    [
                        'begin' => 'begin',
                        'last' => 'last',
                        'created_at' => 'createdAt',
                        'result' => 'result',
                        'id' => 'id',
                    ],
                ],
                'columnNames' => [
                    [
                        'begin' => 'begin',
                        'last' => 'last',
                        'createdAt' => 'created_at',
                        'result' => 'result',
                        'id' => 'id',
                    ],
                ],
                'table' => [
                    [
                        'name' => 'fizzbuzz',
                    ],
                ],
                'idGenerator' => [
                    $o[6],
                ],
                'name' => [
                    'App\\Domain\\FizzBuzz\\Model\\FizzBuzz',
                ],
                'options' => [
                    1 => [
                        'comment' => 'Initial number',
                        'default' => '0',
                    ],
                    [
                        'comment' => 'Final number',
                        'default' => '0',
                    ],
                    [
                        'default' => 'CURRENT_TIMESTAMP',
                    ],
                ],
                'type' => [
                    1 => 'integer',
                    'integer',
                    'datetime_immutable',
                    'json',
                    'uuid',
                ],
                'fieldName' => [
                    1 => 'begin',
                    'last',
                    'createdAt',
                    'result',
                    'id',
                ],
                'columnName' => [
                    1 => 'begin',
                    'last',
                    'created_at',
                    'result',
                    'id',
                ],
                'id' => [
                    5 => true,
                ],
            ],
            'Symfony\\Bridge\\Doctrine\\IdGenerator\\UuidGenerator' => [
                'protoFactory' => [
                    6 => $o[7],
                ],
                'factory' => [
                    6 => $o[7],
                ],
            ],
            'Symfony\\Component\\Uid\\Factory\\UuidFactory' => [
                'defaultClass' => [
                    7 => 'Symfony\\Component\\Uid\\UuidV6',
                ],
                'timeBasedClass' => [
                    7 => 'Symfony\\Component\\Uid\\UuidV6',
                ],
                'nameBasedClass' => [
                    7 => 'Symfony\\Component\\Uid\\UuidV5',
                ],
                'randomBasedClass' => [
                    7 => 'Symfony\\Component\\Uid\\UuidV4',
                ],
                'timeBasedNode' => [
                    7 => null,
                ],
                'nameBasedNamespace' => [
                    7 => null,
                ],
            ],
        ],
        $o[0],
        []
    );
},

]];