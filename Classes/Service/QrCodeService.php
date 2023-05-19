<?php

namespace Passionweb\GenerateQrCode\Service;

use chillerlan\QRCode\{QRCode, QROptions};
use TYPO3\CMS\Core\Core\Environment;

class QrCodeService
{
    public function generateQrCode(array $settings): string
    {
        $options = new QROptions([
            'version'      => 7,
            'scale' => 100,
            'outputType'   => QRCode::OUTPUT_MARKUP_SVG,
            'eccLevel'     => QRCode::ECC_L,
            'addQuietzone' => true,
            'cssClass'     => '',
            'svgOpacity'   => 1.0,
            'svgDefs'      => '
		<linearGradient id="g2">
			<stop offset="0%" stop-color="'.$settings['primaryColor'].'" />
			<stop offset="100%" stop-color="'.$settings['primaryColor'].'" />
		</linearGradient>
		<linearGradient id="g1">
			<stop offset="0%" stop-color="'.$settings['primaryColor'].'" />
			<stop offset="100%" stop-color="'.$settings['primaryColor'].'" />
		</linearGradient>
		<style>rect{shape-rendering:crispEdges}</style>',
            'moduleValues' => [
                // finder
                1536 => 'url(#g1)',
                6    => $settings['secondaryColor'],
                // alignment
                2560 => 'url(#g1)',
                10   => $settings['secondaryColor'],
                // timing
                3072 => 'url(#g1)',
                12   => $settings['secondaryColor'],
                // format
                3584 => 'url(#g1)',
                14   => $settings['secondaryColor'],
                // version
                4096 => 'url(#g1)',
                16   => $settings['secondaryColor'],
                // data
                1024 => 'url(#g2)',
                4    => $settings['secondaryColor'],
                // darkmodule
                512  => 'url(#g1)',
                // separator
                8    => $settings['secondaryColor'],
                // quietzone
                18   => $settings['secondaryColor'],
            ],
        ]);

        $qrCode = (new QRCode($options))->render($settings['target']);

        list(, $qrCode) = explode(';', $qrCode);
        list(, $qrCode)      = explode(',', $qrCode);

        $qrCode = base64_decode($qrCode);
        $qrCodeFile = 'qrcode-example-'.time().'.svg';

        $qrCodePath = Environment::getPublicPath().'/fileadmin/'.$qrCodeFile;
        file_put_contents($qrCodePath, $qrCode);

        return $qrCodePath;
    }
}
