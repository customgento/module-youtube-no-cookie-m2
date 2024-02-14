<?php

declare(strict_types=1);

namespace CustomGento\YouTubeNoCookie\Plugin\Catalog\Product;

use CustomGento\YouTubeNoCookie\Model\VideoUrlConverter;
use Magento\Catalog\Model\Product;
use Magento\Framework\Data\Collection;
use Magento\Framework\DataObject;
use Magento\ProductVideo\Model\Product\Attribute\Media\ExternalVideoEntryConverter;

class ChangeVideoUrlPlugin
{
    /**
     * @var VideoUrlConverter
     */
    private $videoUrlConverter;

    public function __construct(VideoUrlConverter $videoLinkConverter)
    {
        $this->videoUrlConverter = $videoLinkConverter;
    }

    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function afterGetMediaGalleryImages(Product $product, Collection $collection): Collection
    {
        $collection->walk(function (DataObject $object) {
            if (!$object->getData('media_type') || !$object->getData('video_url')
                || $object->getData('media_type') !== ExternalVideoEntryConverter::MEDIA_TYPE_CODE
                || !is_string($object->getData('video_url'))) {
                return;
            }
            $this->updateVideoAttribute($object, 'video_url');
            $this->updateVideoAttribute($object, 'video_url_default');
        });

        return $collection;
    }

    private function updateVideoAttribute(DataObject $object, string $attributeCode): void
    {
        $oldUrl = $object->getData($attributeCode);
        if ($oldUrl) {
            $updatedUrl = $this->videoUrlConverter->convert($object->getData($attributeCode));
            $object->setData($attributeCode, $updatedUrl);
        }
    }
}
