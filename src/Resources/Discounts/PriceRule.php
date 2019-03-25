<?php

namespace Yorki\Shopify\Resources\Discounts;

use Yorki\Shopify\Resources\BaseResource;
use Yorki\Shopify\Resources\Traits\Provides;
use \Carbon\Carbon;

/**
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 * @property-read Carbon $ends_at
 * @property-read Carbon $starts_at
 *
 * @property int $id
 * @property array $entitled_collection_ids
 * @property array $entitled_country_ids
 * @property array $entitled_product_ids
 * @property array $entitled_variant_ids
 * @property array $prerequisite_customer_ids
 * @property array $prerequisite_quantity_range
 * @property array $prerequisite_saved_search_ids
 * @property array $prerequisite_shipping_price_range
 * @property array $prerequisite_subtotal_range
 * @property array $prerequisite_product_ids
 * @property array $prerequisite_variant_ids
 * @property array $prerequisite_collection_ids
 * @property array $prerequisite_to_entitlement_quantity_ratio
 * @property bool $once_per_customer
 * @property int $usage_limit
 * @property int $value
 * @property string $allocation_method
 * @property string $customer_selection
 * @property string $target_selection
 * @property string $target_type
 * @property string $title
 * @property string $value_type
 *
 * @method Carbon getCreatedAt()
 * @method Carbon getUpdatedAt()
 * @method Carbon getEndsAt()
 * @method Carbon getStartsAt()
 * @method int getId()
 * @method array getEntitledCollectionIds()
 * @method array getEntitledCountryIds()
 * @method array getEntitledProductIds()
 * @method array getEntitledVariantIds()
 * @method array getPrerequisiteCustomerIds()
 * @method array getPrerequisiteQuantityRange()
 * @method array getPrerequisiteSavedSearchIds()
 * @method array getPrerequisiteShippingPriceRange()
 * @method array getPrerequisiteSubtotalRange()
 * @method array getPrerequisiteProductIds()
 * @method array getPrerequisiteVariantIds()
 * @method array getPrerequisiteCollectionIds()
 * @method array getPrerequisiteToEntitlementQuantityRatio()
 * @method bool getOncePerCustomer()
 * @method int getUsageLimit()
 * @method int getValue()
 * @method string getAllocationMethod()
 * @method string getCustomerSelection()
 * @method string getTargetSelection()
 * @method string getTargetType()
 * @method string getTitle()
 * @method string getValueType()
 *
 * @method $this setId($id)
 * @method $this setEntitledCollectionIds(array $value)
 * @method $this setEntitledCountryIds(array $value)
 * @method $this setEntitledProductIds(array $value)
 * @method $this setEntitledVariantIds(array $value)
 * @method $this setPrerequisiteCustomerIds(array $value)
 * @method $this setPrerequisiteQuantityRange(array $value)
 * @method $this setPrerequisiteSavedSearchIds(array $value)
 * @method $this setPrerequisiteShippingPriceRange(array $value)
 * @method $this setPrerequisiteSubtotalRange(array $value)
 * @method $this setPrerequisiteProductIds(array $value)
 * @method $this setPrerequisiteVariantIds(array $value)
 * @method $this setPrerequisiteCollectionIds(array $value)
 * @method $this setPrerequisiteToEntitlementQuantityRatio(array $value)
 * @method $this setOncePerCustomer($value)
 * @method $this setUsageLimit($value)
 * @method $this setValue($value)
 * @method $this setAllocationMethod($value)
 * @method $this setCustomerSelection($value)
 * @method $this setTarsetSelection($value)
 * @method $this setTarsetType($value)
 * @method $this setTitle($value)
 * @method $this setValueType($value)
 */
class PriceRule extends BaseResource
{
    use Provides;

    /**
     * @var string
     */
    protected $resourceName = 'price_rule';

    /**
     * @var array
     */
    protected $provides = [
        'price_rule_id' => 'id',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'entitled_collection_ids' => 'array',
        'entitled_country_ids' => 'array',
        'entitled_product_ids' => 'array',
        'entitled_variant_ids' => 'array',
        'prerequisite_customer_ids' => 'array',
        'prerequisite_quantity_range' => 'array',
        'prerequisite_saved_search_ids' => 'array',
        'prerequisite_shipping_price_range' => 'array',
        'prerequisite_subtotal_range' => 'array',
        'prerequisite_product_ids' => 'array',
        'prerequisite_variant_ids' => 'array',
        'prerequisite_collection_ids' => 'array',
        'prerequisite_to_entitlement_quantity_ratio' => 'array',
        'once_per_customer' => 'bool',
        'usage_limit' => 'int',
        'value' => 'int',
    ];
}