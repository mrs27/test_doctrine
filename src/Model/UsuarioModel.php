<?php

namespace Marcelo\Doctrine\Model;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class UsuarioModel extends EntityRepository
{

    public function __construct(EntityManager $entityManager){
        $this->setEntityManager($entityManager);
    }

}
