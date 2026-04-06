<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

trait TimestampableTrait
{
    #[ORM\Column]
    private ?\DateTime $created_at = null;

    #[ORM\Column]
    private ?\DateTime $updated_at = null;

    #[ORM\PrePersist]
    public function updateTimestampsOnCreate(): void
    {
        $now = new \DateTime();
        $this->created_at ??= $now;
        $this->updated_at = $now;
    }

    #[ORM\PreUpdate]
    public function updateTimestampOnUpdate(): void
    {
        $this->updated_at = new \DateTime();
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTime $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTime $updated_at): static
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}
