<?php

declare(strict_types=1);

namespace CustomGento\YouTubeNoCookie\Test\Integration;

use Magento\TestFramework\TestCase\AbstractController;

class ProductPageVideoUrlTest extends AbstractController
{
    /**
     * @magentoDataFixture Magento/ConfigurableProduct/_files/product_configurable_with_media_gallery_video.php
     */
    public function testVideoUrlIsChangedOnConfigurableProductPage(): void
    {
        $this->dispatch('catalog/product/view/id/1');

        $body = $this->getResponse()->getBody();
        self::assertNotContains('youtube.com', $body);
        self::assertNotContains('youtu.be', $body);
        self::assertContains('youtube-nocookie.com', $body);
    }
}
