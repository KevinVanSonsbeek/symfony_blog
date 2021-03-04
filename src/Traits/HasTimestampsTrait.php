<?php
declare(strict_types=1);

namespace App\Traits;

use Safe\DateTime;
use Doctrine\ORM\Mapping as ORM;

trait HasTimestampsTrait
{
    /**
     * @ORM\PrePersist()
     */
    public function prePersistSetTimestamps(): void
    {
        $dateTime = new DateTime('now');
        $this->setCreatedAt($dateTime);
        $this->setUpdatedAt($dateTime);
    }

    /**
     * @ORM\PreUpdate()
     */
    public function preUpdateSetTimestamps(): void
    {
        $this->setUpdatedAt(new DateTime('now'));
    }
}
