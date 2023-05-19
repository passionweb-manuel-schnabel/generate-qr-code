<?php

defined('TYPO3') || die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'GenerateQrCode',
    'Example',
    'Generate QR Code'
);

$pluginSignature = 'generateqrcode_example';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    $pluginSignature,
    'FILE:EXT:generate_qr_code/Configuration/FlexForms/QRCodeOptions.xml'
);
