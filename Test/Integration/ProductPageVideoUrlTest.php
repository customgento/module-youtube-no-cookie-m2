<?php

declare(strict_types=1);

namespace CustomGento\YouTubeNoCookie\Test\Integration;

use Magento\TestFramework\Response;
use Magento\TestFramework\TestCase\AbstractController;

class ProductPageVideoUrlTest extends AbstractController
{
    /**
     * @magentoDataFixture Magento/ConfigurableProduct/_files/product_configurable_with_media_gallery_video.php
     */
    public function testVideoUrlIsChangedOnConfigurableProductPage(): void
    {
        $this->dispatch('catalog/product/view/id/1');

        $response = $this->getResponse();
        self::assertInstanceOf(Response::class, $response);
        $body = $response->getBody();
        self::assertStringNotContainsString('youtube.com', $body);
        self::assertStringNotContainsString('youtu.be', $body);
        self::assertStringContainsString('youtube-nocookie.com', $body);
    }
}
