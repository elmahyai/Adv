<?php

namespace App\Http\Traits;

use Intervention\Video\Facades\Image;
use Pbmedia\LaravelFFMpeg\FFMpegFacade as FFMpeg;

trait VideoTrait
{
    function upload_video($file)
    {
        $filename = $file->getClientOriginalName();
        $path = public_path().DIRECTORY_SEPARATOR.'videos';
        $file->move($path, $filename);
        $filename_new = 'Adv'. uniqid() . '.webm';
        FFMpeg::open($filename)->export()->inFormat(new \FFMpeg\Format\Video\WebM)->save($filename_new);
        $path = url('videos' . DIRECTORY_SEPARATOR . $filename_new);
        return $path;
    }
}
