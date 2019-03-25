<?php

namespace Yorkii\Shopify\Properties\Products;

use Yorkii\Shopify\Properties\Base;
use \Carbon\Carbon;

/**
 * @property-read Carbon $created_at
 *
 * @property string $src
 * @property string $alt
 * @property int $width
 * @property int $height
 *
 * @method Carbon getCreatedAt()
 * @method string getSrc()
 * @method string getAlt()
 * @method int getWidth()
 * @method int getHeight()
 *
 * @method $this setSrc($src)
 * @method $this setAlt($alt)
 * @method $this setWidth($width)
 * @method $this setHeight($height)
 */
class CustomCollectionImage extends Base
{
    /**
     * @var array
     */
    protected $casts = [
        'width' => 'int',
        'height' => 'int',
    ];
}