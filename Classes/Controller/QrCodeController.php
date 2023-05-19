<?php

declare(strict_types=1);

namespace Passionweb\GenerateQrCode\Controller;

use Passionweb\GenerateQrCode\Service\QrCodeService;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class QrCodeController extends ActionController
{
    protected $qrCodeService;

    public function __construct(QrCodeService $qrCodeService)
    {
        $this->qrCodeService = $qrCodeService;
    }

    public function generateQrCodeAction(): ResponseInterface
    {
        $qrCode = $this->qrCodeService->generateQrCode($this->settings);

        $this->view->assign('qrCode', $qrCode);

        return $this->htmlResponse();
    }
}
