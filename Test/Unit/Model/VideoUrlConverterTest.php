<?php

declare(strict_types=1);

namespace CustomGento\YouTubeNoCookie\Test\Unit\Model;

use CustomGento\YouTubeNoCookie\Model\VideoUrlConverter;
use PHPUnit\Framework\Attributes\DataProvider;
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
    #[DataProvider('urlDataProvider')]
    public function testConvert(string $url, string $noCookieUrl): void
    {
        self::assertEquals($noCookieUrl, $this->videoUrlConverter->convert($url));
    }

    public static function urlDataProvider(): array
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
            [
                'https://youtu.be/YbsE8PlZc-M?si=AbCdEfGhIjKlMnOp',
                'https://www.youtube-nocookie.com/embed/YbsE8PlZc-M'
            ],
            [
                'https://youtu.be/YbsE8PlZc-M?t=42',
                'https://www.youtube-nocookie.com/embed/YbsE8PlZc-M'
            ],
            [
                'https://youtu.be/YbsE8PlZc-M?si=AbCdEfGhIjKlMnOp&t=42',
                'https://www.youtube-nocookie.com/embed/YbsE8PlZc-M'
            ],
            [
                'https://youtu.be/YbsE8PlZc-M?',
                'https://www.youtube-nocookie.com/embed/YbsE8PlZc-M'
            ],
            [
                'https://youtu.be/YbsE8PlZc-M#t=42',
                'https://www.youtube-nocookie.com/embed/YbsE8PlZc-M'
            ],
            [
                'https://youtube.com/watch?v=YbsE8PlZc-M',
                'https://www.youtube-nocookie.com/embed/YbsE8PlZc-M'
            ],
            [
                'https://www.youtube.com/watch?feature=share&v=YbsE8PlZc-M',
                'https://www.youtube-nocookie.com/embed/YbsE8PlZc-M'
            ],
            [
                'https://www.youtube.com/watch?app=desktop&v=YbsE8PlZc-M&t=42s',
                'https://www.youtube-nocookie.com/embed/YbsE8PlZc-M'
            ],
            [
                'https://m.youtube.com/watch?v=YbsE8PlZc-M',
                'https://www.youtube-nocookie.com/embed/YbsE8PlZc-M'
            ],
            [
                'https://www.youtube.com/watch?v=YbsE8PlZc-M#t=42',
                'https://www.youtube-nocookie.com/embed/YbsE8PlZc-M'
            ],
            [
                'https://www.youtube.com/embed/YbsE8PlZc-M?start=42',
                'https://www.youtube-nocookie.com/embed/YbsE8PlZc-M'
            ],
            [
                'https://www.youtube.com/embed/YbsE8PlZc-M?rel=0&start=42',
                'https://www.youtube-nocookie.com/embed/YbsE8PlZc-M'
            ],
            [
                'https://www.youtube.com/v/YbsE8PlZc-M?version=3',
                'https://www.youtube-nocookie.com/embed/YbsE8PlZc-M'
            ],
            [
                'https://www.youtube.com/embed/YbsE8PlZc-M/',
                'https://www.youtube-nocookie.com/embed/YbsE8PlZc-M'
            ],
            [
                'https://www.youtube.com/watch?xv=YbsE8PlZc-M',
                'https://www.youtube.com/watch?xv=YbsE8PlZc-M'
            ],
            [
                'https://www.youtube.com/watch?list=PLabc&index=2',
                'https://www.youtube.com/watch?list=PLabc&index=2'
            ],
            [
                'https://vimeo.com/76979871',
                'https://vimeo.com/76979871'
            ],
        ];
    }
}
