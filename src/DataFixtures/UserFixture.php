<?php
declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Generator;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use function Safe\sprintf;

/**
 * Class UserFixture
 *
 * @package App\DataFixtures
 * @psalm-suppress PropertyNotSetInConstructor
 */
class UserFixture extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private UserPasswordEncoderInterface $passwordEncoder;

    /**
     * @var Generator
     */
    private Generator $faker;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
        $this->faker = new Generator();
    }

    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->setEmail(sprintf('test%d@example.com', $i));
            $user->setFirstName($this->faker->firstName);
            $user->setLastName($this->faker->lastName);
            $user->setPassword(
                $this->passwordEncoder->encodePassword(
                    $user,
                    'test'
                )
            );

            $manager->persist($user);
        }

        $manager->flush();
    }
}
