<?php

namespace App\Twig\Components;

use Jbtronics\SettingsBundle\Manager\SettingsManagerInterface;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent]
final class ThemeSettings
{
    public \App\Settings\ThemeSettings $theme;

    public function __construct(SettingsManagerInterface $settingsManager)
    {
        $this->theme = $settingsManager->get(\App\Settings\ThemeSettings::class);
    }
}
