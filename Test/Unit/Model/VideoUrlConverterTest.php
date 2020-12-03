<?php

declare(strict_types=1);

namespace CustomGento\YouTubeNoCookie\Test\Unit\Model;

use CustomGento\YouTubeNoCookie\Model\VideoUrlConverter;
use PHPUnit\Framework\TestCase;

class VideoUrlConverterTest extends TestCase
{
    /**
     * @var VideoUrlConverter
     */
    private $videoUrlConverter;

    protected function setUp(): void
    {
        $this->videoUrlConverter = new VideoUrlConverter();
    }

    /**
     * @param string $url
     * @param string $noCookieUrl
     *
     * @dataProvider urlDataProvider
     */
    public function testConvert(string $url, string $noCookieUrl): void
    {
        self::assertEquals($noCookieUrl, $this->videoUrlConverter->convert($url));
    }

    public function urlDataProvider(): array
    {
        return [
            [
                'http://youtu.be/YbsE8PlZc-M',
                'https://www.youtube-nocookie.com/embed/YbsE8PlZc-M'
            ],
            [
                'https://youtu.be/YbsE8PlZc-M',
                'https://www.youtube-nocookie.com/embed/YbsE8PlZc-M'
            ],
            [
                'http://www.youtube.com/embed/YbsE8PlZc-M',
                'https://www.youtube-nocookie.com/embed/YbsE8PlZc-M'
            ],
            [
                'https://www.youtube.com/embed/YbsE8PlZc-M',
                'https://www.youtube-nocookie.com/embed/YbsE8PlZc-M'
            ],
            [
                'http://www.youtube.com/watch?v=YbsE8PlZc-M',
                'https://www.youtube-nocookie.com/embed/YbsE8PlZc-M'
            ],
            [
                'https://www.youtube.com/watch?v=YbsE8PlZc-M',
                'https://www.youtube-nocookie.com/embed/YbsE8PlZc-M'
            ],
            [
                'http://www.youtube.com/watch?v=YbsE8PlZc-M&feature=g-vrec',
                'https://www.youtube-nocookie.com/embed/YbsE8PlZc-M'
            ],
            [
                'https://www.youtube.com/watch?v=YbsE8PlZc-M&feature=g-vrec',
                'https://www.youtube-nocookie.com/embed/YbsE8PlZc-M'
            ],
            [
                'http://www.youtube.com/watch?v=YbsE8PlZc-M&feature=youtu.be',
                'https://www.youtube-nocookie.com/embed/YbsE8PlZc-M'
            ],
            [
                'https://www.youtube.com/watch?v=YbsE8PlZc-M&feature=youtu.be',
                'https://www.youtube-nocookie.com/embed/YbsE8PlZc-M'
            ],
        ];
    }
}
