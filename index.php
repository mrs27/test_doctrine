
<?php 
require_once './bootstrap.php';
// require_once "./vendor/autoload.php";

// use Doctrine\ORM\ORMSetup;
// use Doctrine\ORM\EntityManager;
use Marcelo\Doctrine\Entities\Usuario;
use Marcelo\Doctrine\Model\UsuarioModel;

// $paths = [__DIR__."/src/Entities"];
// $isDevMode = true;
// $config = ORMSetup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null);

// //aqui configuramos a conexão com banco de dados
// $params = [
//     'url' => "mysql://root:macinfo@localhost/test"
// ];

// //Obter a instância da classe Entity Manager
// $entityManager = EntityManager::create($params, $config);

 $entityManager = getEntityManager();



$usuario = new Usuario();
$usuario->setId(2);
$usuario->setNome('Teste 1e334');
$usuario->setTelefone('4499858787');
$usuario->setEmail('teste1@example.com');
$usuario->setAtivo('S');
//$entityManager->merge($usuario);
//$entityManager->flush();


//$qb = $entityManager->createQueryBuilder();
//$qb->select('u')->from('Marcelo\Doctrine\Entities\Usuario', 'u')
//->where('u.nome like')
//->orderBy('u.nome', 'asc')->getQuery();
//$query = $qb->getQuery();
//var_dump($query->getResult());

$usuarioModel = new UsuarioModel($entityManager);
$qb = $usuarioModel->createQueryBuilder();

$qb->select('u')
   ->from('Usuario', 'u')
   //->where('u.id = ?1')
   ->orderBy('u.id', 'ASC');
$query = $qb->getQuery();
var_dump($query->getResult());

//$users = $entityManager->find('Marcelo\Doctrine\Entities\Usuario',2);
//var_dump($users);