<?php

namespace App\Services;

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Label\LabelAlignment;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;

class MembershipService {

    public function generateUserQR($content) {
        $result = Builder::create()
        ->writer(new PngWriter())
        ->writerOptions([])
        ->data($content)
        ->encoding(new Encoding('UTF-8'))
        ->errorCorrectionLevel(ErrorCorrectionLevel::High)
        ->size(300)
        ->margin(10)
        ->roundBlockSizeMode(RoundBlockSizeMode::Margin)
        // ->logoPath(__DIR__.'/assets/symfony.png')
        // ->logoResizeToWidth(50)
        // ->logoPunchoutBackground(true)
        // ->labelText('This is the label')
        // ->labelFont(new NotoSans(20))
        // ->labelAlignment(LabelAlignment::Center)
        ->validateResult(false)
        ->build();

        $filePath = '/images/qr/' . time() . '_' . request()->user_id . "_qr_code.png";
        $result->saveToFile($_SERVER['DOCUMENT_ROOT'] . $filePath);

        return $filePath;
    }

}