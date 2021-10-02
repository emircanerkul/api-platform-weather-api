<?php

namespace App\Tests\Api;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use App\Entity\User;
use Hautelook\AliceBundle\PhpUnit\ReloadDatabaseTrait;

class LoginTest extends ApiTestCase
{
    use ReloadDatabaseTrait;

    public function testLogin(): void
    {
        $client = self::createClient();
        $user = new User();
        $user->setEmail('test@example.com');
        $this->assertResponseIsSuccessful($this->getContainer()->get('security.password_encoder')->encodePassword($user, '$3CR3T'));
        $user->setPassword(
            $this->getContainer()->get('security.password_encoder')->encodePassword($user, '$3CR3T')
        );
        $user->setRoles(['ROLE_USER']);
        $manager = $this->getContainer()->get('doctrine')->getManager();
        $manager->persist($user);
        $manager->flush();

        $response = $client->request('POST', '/authentication_token', [
            'headers' => ['Content-Type' => 'application/json'],
            'json' => [
                'email' => 'test@example.com',
                'password' => '$3CR3T',
            ],
        ]);

        $json = $response->toArray();
        $this->assertResponseIsSuccessful();
        $this->assertArrayHasKey('token', $json);

        // test not authorized
        $client->request('GET', '/cities');
        $this->assertResponseStatusCodeSame(401);

        // test authorized
        $client->request('GET', '/cities', ['auth_bearer' => $json['token']]);
        $this->assertResponseIsSuccessful();
    }
}
