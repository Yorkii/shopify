<?php

namespace Yorki\Shopify\Resources\Products;

use Yorki\Shopify\Collection;
use Yorki\Shopify\Criteria\Products\ProductVariantCriteria;
use Yorki\Shopify\Resources\BaseResource;
use Yorki\Shopify\Resources\Metafield\Metafield;
use Yorki\Shopify\Resources\Traits\Counts;
use Yorki\Shopify\Resources\Traits\Depends;
use \Carbon\Carbon;

/**
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 * @property-read Collection $metafields
 *
 * @property int $id
 * @property int $product_id
 * @property int $position
 * @property float $compare_at_price
 * @property int $grams
 * @property int $image_id
 * @property int $inventory_item_id
 * @property int $inventory_quantity
 * @property int $old_inventory_quantity
 * @property int $inventory_quantity_adjustment
 * @property float $price
 * @property bool $requires_shipping
 * @property bool $taxable
 * @property int $weight
 * @property string $barcode
 * @property string $fulfillment_service
 * @property string $inventory_management
 * @property string $inventory_policy
 * @property string $option
 * @property string $sku
 * @property string $tax_code
 * @property string $title
 * @property string $weight_unit
 * 
 * @method int getId()
 * @method Carbon getCreatedAt()
 * @method Carbon getUpdatedAt()
 * @method Collection getMetafields()
 * @method int getProductId()
 * @method int getPosition()
 * @method float getCompareAtPrice()
 * @method int getGrams()
 * @method int getImageId()
 * @method int getInventoryItemId()
 * @method int getInventoryQuantity()
 * @method int getOldInventoryQuantity()
 * @method int getInventoryQuantityAdjustment()
 * @method float getPrice()
 * @method bool getRequiresShipping()
 * @method bool getTaxable()
 * @method int getWeight()
 * @method string getBarcode()
 * @method string getFulfillmentService()
 * @method string getInventoryManagement()
 * @method string getInventoryPolicy()
 * @method string getOption()
 * @method string getSku()
 * @method string getTaxCode()
 * @method string getTitle()
 * @method string getWeightUnit()
 *
 * @method $this setId($id)
 * @method $this setProductId($productId)
 * @method $this setPosition($position)
 * @method $this setCompareAtPrice($compareAtPrice)
 * @method $this setGrams($grams)
 * @method $this setImageId($image_id)
 * @method $this setInventoryItemId($inventoryItemId)
 * @method $this setInventoryQuantity($inventoryQuantity)
 * @method $this setOldInventoryQuantity($oldInventoryQuantity)
 * @method $this setInventoryQuantityAdjustment($inventoryQuantityAdjustment)
 * @method $this setPrice($price)
 * @method $this setRequiresShipping($requiresShipping)
 * @method $this setTaxable($taxable)
 * @method $this setWeight($weight)
 * @method $this setBarcode($barcode)
 * @method $this setFulfillmentService($fulfillmentService)
 * @method $this setInventoryManagement($inventoryManagement)
 * @method $this setInventoryPolicy($inventoryPolicy)
 * @method $this setOption($option)
 * @method $this setSku($sku)
 * @method $this setTaxCode($taxCode)
 * @method $this setTitle($title)
 * @method $this setWeightUnit($weightUnit)
 */
class ProductVariant extends BaseResource
{
    use Counts,
        Depends;

    /**
     * @var string
     */
    protected $resourceName = 'variant';

    /**
     * @var string
     */
    protected $endpoint = 'admin/products/:product_id/variants';

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
        'compare_at_price' => 'float',
        'grams' => 'int',
        'inventory_quantity' => 'int',
        'old_inventory_quantity' => 'int',
        'inventory_quantity_adjustment' => 'int',
        'metafields' => 'collection:resource:' . Metafield::class,
        'position' => 'int',
        'price' => 'float',
        'requires_shipping' => 'bool',
        'taxable' => 'bool',
        'weight' => 'int',
    ];

    /**
     * @return string
     */
    public function getEndpointSingle()
    {
        return 'admin/variants';
    }

    /**
     * @return ProductVariantCriteria
     */
    public function criteria()
    {
        return new ProductVariantCriteria($this->client);
    }
}