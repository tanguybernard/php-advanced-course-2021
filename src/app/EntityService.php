<?php

namespace Course\App;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;


class EntityService{

    public function getEntityManager(){
        $entitiesPath = [
            join(DIRECTORY_SEPARATOR, [__DIR__, "..","infrastructure", 'typeorm', 'entities'])
        ];

        $isDevMode = true;
        $proxyDir = null;
        $cache = null;
        $useSimpleAnnotationReader = false;

// Connexion à la base de données
        $dbParams = [
            'driver'   => 'pdo_pgsql',
            'host'     => 'database',
            'charset'  => 'utf8',
            'user'     => 'postgres',
            'password' => 'secret',
            'dbname'   => 'testdbcourse',
        ];

        $config = Setup::createAnnotationMetadataConfiguration(
            $entitiesPath,
            $isDevMode,
            $proxyDir,
            $cache,
            $useSimpleAnnotationReader
        );
        $entityManager = EntityManager::create($dbParams, $config);

        return $entityManager;
    }
}
