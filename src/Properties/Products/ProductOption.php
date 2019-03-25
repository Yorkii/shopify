<?php

namespace Yorki\Shopify\Properties\Products;

use Yorki\Shopify\Properties\Base;

/**
 * @property int $id
 * @property int $product_id
 * @property string $name
 * @property int $position
 * @property array $values
 *
 * @method int getId()
 * @method int getProductId()
 * @method string getName()
 * @method int getPosition()
 * @method array getValues()
 * 
 * @method int setId($id)
 * @method int setProductId($productId)
 * @method string setName($name)
 * @method int setPosition($position)
 * @method array setValues(array $values)
 */
class ProductOption extends Base
{
    /**
     * @var array
     */
    protected $casts = [
        'position' => 'int',
        'values' => 'array',
    ];
}
