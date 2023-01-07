
<?php
require_once "./vendor/autoload.php";

use Doctrine\ORM\ORMSetup;
use Doctrine\ORM\EntityManager;
use Doctrine\DBAL\DriverManager;

function getEntityManager(): \Doctrine\ORM\EntityManager
{
    $entityManager = null;

    if ($entityManager === null) {
        //$paths = [__DIR__ . "/src/Entities"];
        //$isDevMode = true;
        //$config = ORMSetup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null);

        $config = ORMSetup::createAttributeMetadataConfiguration(
            paths: array(__DIR__."/src/Entities"),
            isDevMode: true,
        );

        //aqui configuramos a conexão com banco de dados
        //$connection = [
          //  'url' => "mysql://root:macinfo@localhost/test"
        //];

        $dbParams=[
            'driver'   => 'pdo_mysql',
            'user'     => 'root',
            'password' => 'macinfo',
            'dbname'   => 'test',
        ];

        $connection=DriverManager::getConnection($dbParams, $config);

        //Obter a instância da classe Entity Manager
        //$entityManager = EntityManager::create($connection, $config);
        $entityManager = new EntityManager($connection, $config);
    }

    return $entityManager;
}
