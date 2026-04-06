<?php

namespace App\Settings;

use Jbtronics\SettingsBundle\Settings\Settings;
use Jbtronics\SettingsBundle\Settings\SettingsParameter;
use Jbtronics\SettingsBundle\Storage\ORMStorageAdapter;
use Symfony\Component\Form\Extension\Core\Type\ColorType;

#[Settings(storageAdapter: ORMStorageAdapter::class, storageAdapterOptions: ['entity_class' => \App\Entity\ThemeSettings::class])]
class ThemeSettings
{
    /**
     * Colors.
     */
    #[SettingsParameter(formType: ColorType::class, formOptions: ['help' => 'Default: oklch(0.88 0.15 95)'])]
    public string $yellow = '#f6d653';
    #[SettingsParameter(formType: ColorType::class, formOptions: ['help' => 'Default: oklch(0.78 0.16 80)'])]
    public string $amber = '#ecaa0b';
    #[SettingsParameter(formType: ColorType::class, formOptions: ['help' => 'Default: oklch(0.75 0.18 65)'])]
    public string $orange = '#f99100';
    #[SettingsParameter(formType: ColorType::class, formOptions: ['help' => 'Default: oklch(0.62 0.22 35)'])]
    public string $red = '#ed3b00';
    #[SettingsParameter(formType: ColorType::class, formOptions: ['help' => 'Default: oklch(0.62 0.25 350)'])]
    public string $pink = '#e8179b';
    #[SettingsParameter(formType: ColorType::class, formOptions: ['help' => 'Default: oklch(0.65 0.24 310)'])]
    public string $purple = '#bb55f9';
    #[SettingsParameter(formType: ColorType::class, formOptions: ['help' => 'Default: oklch(0.55 0.25 275)'])]
    public string $indigo = '#f6d653';
    #[SettingsParameter(formType: ColorType::class, formOptions: ['help' => 'Default: oklch(0.5 0.28 270)'])]
    public string $blue = '#5250ff';
    #[SettingsParameter(formType: ColorType::class, formOptions: ['help' => 'Default: oklch(0.82 0.08 185)'])]
    public string $teal = '#86d5cb';
    #[SettingsParameter(formType: ColorType::class, formOptions: ['help' => 'Default: oklch(0.72 0.18 165)'])]
    public string $green = '#00c688';
    #[SettingsParameter(formType: ColorType::class, formOptions: ['help' => 'Default: oklch(0.8 0.16 130)'])]
    public string $lime = '#9bd25b';
    #[SettingsParameter(formType: ColorType::class, formOptions: ['help' => 'Default: oklch(0.88 0.22 115)'])]
    public string $highlighter = '#d5e600';
    #[SettingsParameter(formType: ColorType::class, formOptions: ['help' => 'Default: oklch(0.55 0.12 60)'])]
    public string $brown = '#a35e16';

    /**
     * Radius.
     */
    #[SettingsParameter(formOptions: ['help' => 'Default: 2px'])]
    public string $borderRadiusXs = '2px';
    #[SettingsParameter(formOptions: ['help' => 'Default: 4px'])]
    public string $borderRadiusS = '4px';
    #[SettingsParameter(formOptions: ['help' => 'Default: 8px'])]
    public string $borderRadiusM = '8px';
    #[SettingsParameter(formOptions: ['help' => 'Default: 16px'])]
    public string $borderRadiusL = '16px';
    #[SettingsParameter(formOptions: ['help' => 'Default: 24px'])]
    public string $borderRadiusXl = '24px';
    #[SettingsParameter(formOptions: ['help' => 'Default: 32px'])]
    public string $borderRadiusXXl = '32px';
}
