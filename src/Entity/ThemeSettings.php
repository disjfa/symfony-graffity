<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Jbtronics\SettingsBundle\Entity\AbstractSettingsORMEntry;

#[ORM\Entity]
class ThemeSettings extends AbstractSettingsORMEntry
{
    #[ORM\Id, ORM\GeneratedValue, ORM\Column(type: Types::INTEGER)]
    protected int $id;
}
