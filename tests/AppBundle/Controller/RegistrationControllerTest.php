<?php
declare(strict_types=1);

namespace App\Tests\AppBundle\Controller;

use Symfony\Component\Panther\PantherTestCase;

class RegistrationControllerTest extends PantherTestCase
{
    public function testMyApp(): void
    {
        $client = static::createPantherClient();
        $client->request('GET', '/register');

        static::assertPageTitleContains('Register');
    }
}
