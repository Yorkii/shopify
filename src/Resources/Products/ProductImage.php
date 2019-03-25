<?php

namespace Yorki\Shopify\Resources\Products;

use Yorki\Shopify\Criteria\Products\ProductImageCriteria;
use Yorki\Shopify\Resources\BaseResource;
use Yorki\Shopify\Resources\Traits\Counts;
use Yorki\Shopify\Resources\Traits\Depends;
use \Carbon\Carbon;

/**
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 *
 * @property int $id
 * @property int $position
 * @property int $product_id
 * @property array $variants_ids
 * @property string $src
 * @property int $width
 * @property int $height
 *
 * @method int getId()
 * @method Carbon getCreatedAt()
 * @method Carbon getUpdatedAt()
 * @method int getProductId()
 * @method int getPosition()
 * @method array getVariantsIds()
 * @method string getSrc()
 * @method int getWidth()
 * @method int getHeight()
 *
 * @method $this setId($id)
 * @method $this setProductId($productId)
 * @method $this setPosition($position)
 * @method $this setVariantsIds(array $variantsIds)
 * @method $this setSrc($src)
 * @method $this setWidth($width)
 * @method $this setHeight($height)
 *
 */
class ProductImage extends BaseResource
{
    use Counts,
        Depends;

    /**
     * @var string
     */
    protected $resourceName = 'image';

    /**
     * @var string
     */
    protected $endpoint = 'admin/products/:product_id/images';

    /**
     * @var array
     */
    protected $depends = [
        'product_id',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'position' => 'int',
        'variants_ids' => 'array',
        'width' => 'int',
        'height' => 'int',
    ];

    /**
     * @return ProductImageCriteria
     */
    public function criteria()
    {
        return new ProductImageCriteria($this->client);
    }
}