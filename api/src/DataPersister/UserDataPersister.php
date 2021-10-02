<?php

namespace App\DataPersister;

use ApiPlatform\Core\DataPersister\DataPersisterInterface;
use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserDataPersister implements DataPersisterInterface
{
    private $decoratedDataPersister;
    private $userPasswordHasher;

    public function __construct(DataPersisterInterface $decoratedDataPersister, UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->decoratedDataPersister = $decoratedDataPersister;
        $this->userPasswordHasher = $userPasswordHasher;
    }

    public function supports($data): bool
    {
        return $data instanceof User;
    }

    /**
     * @param User $data
     */
    public function persist($data)
    {
        if ($data->getPassword()) {
            $data->setPassword(
                $this->userPasswordHasher->hashPassword($data, $data->getPassword())
            );
        }
        $this->decoratedDataPersister->persist($data);
    }

    public function remove($data)
    {
        $this->decoratedDataPersister->remove($data);
    }
}
