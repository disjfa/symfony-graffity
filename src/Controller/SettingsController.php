<?php

namespace App\Controller;

use App\Settings\ThemeSettings;
use Jbtronics\SettingsBundle\Form\SettingsFormFactoryInterface;
use Jbtronics\SettingsBundle\Manager\SettingsManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SettingsController extends AbstractController
{
    public function __construct(private readonly SettingsManagerInterface $settingsManager, private readonly SettingsFormFactoryInterface $settingsFormFactory)
    {
    }

    #[Route('/settings', name: 'app_settings')]
    public function index(Request $request): Response
    {
        // Create a temporary copy of the settings object, which we can modify in the form without breaking anything with invalid data
        $settings = $this->settingsManager->createTemporaryCopy(ThemeSettings::class);

        // Create a builder for the settings form
        $builder = $this->settingsFormFactory->createSettingsFormBuilder($settings);

        $form = $builder->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Save the settings if the form is submitted and valid
            $this->settingsManager->mergeTemporaryCopy($settings);
            $this->settingsManager->save();

            $this->addFlash('success', 'Settings saved successfully.');

            return $this->redirectToRoute('app_settings');
        }

        return $this->render('settings/index.html.twig', [
            'form' => $form,
        ]);
    }
}
