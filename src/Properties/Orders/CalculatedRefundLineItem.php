<?php

namespace Yorkii\Shopify\Properties\Orders;

use Yorkii\Shopify\Properties\Base;

/**
 * @property int $quantity
 * @property int $line_item_id
 * @property float $price
 * @property float $subtotal
 * @property float $total_tax
 * @property float $discounted_price
 * @property float $discounted_total_price
 * @property float $total_cart_discount_amount
 * 
 * @method int getQuantity()
 * @method int getLineItemId()
 * @method float getPrice()
 * @method float getSubtotal()
 * @method float getTotalTax()
 * @method float getDiscountedPrice()
 * @method float getDiscountedTotalPrice()
 * @method float getTotalCartDiscountAmount()
 * 
 * @method $this setQuantity($quantity)
 * @method $this setLineItemId($lineItemId)
 * @method $this setPrice($price)
 * @method $this setSubtotal($subtotal)
 * @method $this setTotalTax($totalTax)
 * @method $this setDiscountedPrice($discountedPrice)
 * @method $this setDiscountedTotalPrice($discountedTotalPrice)
 * @method $this setTotalCartDiscountAmount($totalCartDiscountAmount)
 */
class CalculatedRefundLineItem extends Base
{
    /**
     * @var array 
     */
    protected $casts = [
        'quantity' => 'int',
        'price' => 'float',
        'subtotal' => 'float',
        'total_tax' => 'float',
        'discounted_price' => 'float',
        'discounted_total_price' => 'float',
        'total_cart_discount_amount' => 'float',
    ];
}