<?php

return [
    'default_disk' => 'public_out',

    'ffmpeg' => [
        'binaries' => env('FFMPEG_BINARIES', '/usr/local/bin/ffmpeg'),
        'threads' => 12,
    ],

    'ffprobe' => [
        'binaries' => env('FFPROBE_BINARIES', '/usr/local/bin/ffprobe'),
    ],

    'timeout' => 3600,
];
