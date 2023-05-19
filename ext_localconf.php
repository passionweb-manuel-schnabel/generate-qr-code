<?php

defined('TYPO3') or die('Access denied.');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'GenerateQrCode',
    'Example',
    [
        \Passionweb\GenerateQrCode\Controller\QrCodeController::class => 'generateQrCode'
    ],
    // non-cacheable actions
    [
        \Passionweb\GenerateQrCode\Controller\QrCodeController::class => 'generateQrCode',
    ]
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
    'mod {
                wizards.newContentElement.wizardItems.plugins {
                    elements {
                        example {
                            iconIdentifier = plugin-example
                            title = LLL:EXT:generate_qr_code/Resources/Private/Language/locallang_db.xlf:plugin_generate_qr_code_example.name
                            description = LLL:EXT:generate_qr_code/Resources/Private/Language/locallang_db.xlf:plugin_generate_qr_code_example.description
                            tt_content_defValues {
                                CType = list
                                list_type = generateqrcode_example
                            }
                        }
                    }
                    show = *
                }
           }'
);
$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);

$iconRegistry->registerIcon(
    'plugin-example',
    \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
    ['source' => 'EXT:generate_qr_code/Resources/Public/Icons/Extension.png']
);
