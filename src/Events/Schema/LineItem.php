<?php

namespace Yorki\Shopify\Events\Schema;

/**
 * @property int $id
 * @property array $properties
 * @property int $quantity
 * @property int $variant_id
 * @property string $variant_title
 * @property string $key
 * @property string $title
 * @property float $price
 * @property float $original_price
 * @property float $discounted_price
 * @property float $line_price
 * @property float $original_line_price
 * @property float $total_discount
 * @property array $discounts
 * @property string $sku
 * @property int $grams
 * @property string $vendor
 * @property bool $taxable
 * @property int $product_id
 * @property bool $gift_card
 * @property array $applied_discounts
 * @property string $compare_at_price
 * @property int $destination_location_id
 * @property string $fulfillment_service
 * @property int $origin_location_id
 * @property bool $requires_shipping
 * @property array $tax_lines
 *
 * @method int getId()
 * @method array getProperties()
 * @method int getQuantity()
 * @method int getVariantId()
 * @method string getVariantTitle()
 * @method string getKey()
 * @method string getTitle()
 * @method float getPrice()
 * @method float getOriginalPrice()
 * @method float getDiscountedPrice()
 * @method float getLinePrice()
 * @method float getOriginalLinePrice()
 * @method float getTotalDiscount()
 * @method array getDiscounts()
 * @method string getSku()
 * @method int getGrams()
 * @method string getVendor()
 * @method bool getTaxable()
 * @method int getProductId()
 * @method bool getGiftCard()
 * @method array getAppliedDiscounts()
 * @method string getCompareAtPrice()
 * @method int getDestinationLocationId()
 * @method string getFulfillmentService()
 * @method int getOriginLocationId()
 * @method bool getRequiresShipping()
 * @method array getTaxLines()
 */
class LineItem extends Base
{
    /**
     * @var array
     */
    protected $casts = [
        'quantity' => 'int',
        'price' => 'float',
        'original_price' => 'float',
        'discounted_price' => 'float',
        'line_price' => 'float',
        'original_line_price' => 'float',
        'total_discount' => 'float',
        'applied_discounts' => 'array',
        'discounts' => 'array',
        'properties' => 'array',
        'grams' => 'int',
        'taxable' => 'bool',
        'gift_card' => 'bool',
        'requires_shipping' => 'bool',
    ];
}