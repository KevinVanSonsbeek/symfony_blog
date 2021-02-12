<?php

namespace App\Traits;

use Doctrine\ORM\Mapping as ORM;

trait HasTimestampsTrait
{
    /**
     * @ORM\PrePersist()
     */
    public function prePersistSetTimestamps(): void
    {
        $dateTime = new \DateTime('now');
        $this->setCreatedAt($dateTime);
        $this->setUpdatedAt($dateTime);
    }

    /**
     * @ORM\PreUpdate()
     */
    public function preUpdateSetTimestamps(): void
    {
        $this->setUpdatedAt(new \DateTime('now'));
    }
}