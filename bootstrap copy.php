
<?php
require_once "./vendor/autoload.php";

use Doctrine\ORM\ORMSetup;
use Doctrine\ORM\EntityManager;

function getEntityManager(): \Doctrine\ORM\EntityManager
{
    $entityManager = null;

    if ($entityManager === null) {
        $paths = [__DIR__ . "/src/Entities"];
        $isDevMode = true;
        $config = ORMSetup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null);

        //aqui configuramos a conexão com banco de dados
        $connection = [
            'url' => "mysql://root:macinfo@localhost/test"
        ];

        //Obter a instância da classe Entity Manager
        $entityManager = EntityManager::create($connection, $config);
    }

    return $entityManager;
}
