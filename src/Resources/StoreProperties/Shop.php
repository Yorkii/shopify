<?php

namespace Yorki\Shopify\Resources\StoreProperties;

use Yorki\Shopify\Resources\Base;
use Yorki\Shopify\Resources\Traits\GetsAll;
use \Carbon\Carbon;

/**
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 *
 * @property int $id
 * @property string $address1
 * @property string $address2
 * @property string $city
 * @property string $country
 * @property string $country_code
 * @property string $country_name
 * @property string $customer_email
 * @property string $currency
 * @property string $domain
 * @property string $google_apps_domain
 * @property float $latitude
 * @property float $longitude
 * @property string $money_format
 * @property string $money_with_currency_format
 * @property string $weight_unit
 * @property string $myshopify_domain
 * @property string $name
 * @property string $plan_name
 * @property string $plan_display_name
 * @property string $phone
 * @property string $primary_locale
 * @property string $province
 * @property string $province_code
 * @property string $shop_owner
 * @property string $source
 * @property string $timezone
 * @property string $iana_timezone
 * @property string $zip
 * @property bool $google_apps_login_enabled
 * @property bool $has_discounts
 * @property bool $has_gift_cards
 * @property bool $password_enabled
 * @property bool $pre_launch_enabled
 * @property bool $force_ssl
 * @property bool $tax_shipping
 * @property bool $taxes_included
 * @property bool $county_taxes
 * @property bool $has_storefront
 * @property bool $setup_required
 * @property bool $checkout_api_supported
 * @property bool $multi_location_enabled
 * 
 * @method Carbon getCreatedAt()
 * @method Carbon getUpdatedAt()
 * @method int getId()
 * @method string getAddress1()
 * @method string getAddress2()
 * @method string getCity()
 * @method string getCountry()
 * @method string getCountryCode()
 * @method string getCountryName()
 * @method string getCustomerEmail()
 * @method string getCurrency()
 * @method string getComain()
 * @method string getCoogleAppsDomain()
 * @method float getLatitude()
 * @method float getLongitude()
 * @method string getMoneyFormat()
 * @method string getMoneyWithCurrencyFormat()
 * @method string getWeightUnit()
 * @method string getMyshopifyDomain()
 * @method string getName()
 * @method string getPlanName()
 * @method string getPlanDisplayName()
 * @method string getPhone()
 * @method string getPrimaryLocale()
 * @method string getProvince()
 * @method string getProvinceCode()
 * @method string getShopOwner()
 * @method string getSource()
 * @method string getTimezone()
 * @method string getIanaTimezone()
 * @method string getZip()
 * @method bool getGoogleAppsLoginEnabled()
 * @method bool getHasDiscounts()
 * @method bool getHasGiftCards()
 * @method bool getPasswordEnabled()
 * @method bool getPreLaunchEnabled()
 * @method bool getForceSsl()
 * @method bool getTaxShipping()
 * @method bool getTaxesIncluded()
 * @method bool getCountyTaxes()
 * @method bool getHasStorefront()
 * @method bool getSetupRequired()
 * @method bool getCheckoutApiSupported()
 * @method bool getMultiLocationEnabled()
 * 
 * @method $this setId($value)
 * @method $this setAddress1($value)
 * @method $this setAddress2($value)
 * @method $this setCity($value)
 * @method $this setCountry($value)
 * @method $this setCountryCode($value)
 * @method $this setCountryName($value)
 * @method $this setCustomerEmail($value)
 * @method $this setCurrency($value)
 * @method $this setComain($value)
 * @method $this setCoogleAppsDomain($value)
 * @method $this setLatitude($value)
 * @method $this setLongitude($value)
 * @method $this setMoneyFormat($value)
 * @method $this setMoneyWithCurrencyFormat($value)
 * @method $this setWeightUnit($value)
 * @method $this setMyshopifyDomain($value)
 * @method $this setName($value)
 * @method $this setPlanName($value)
 * @method $this setPlanDisplayName($value)
 * @method $this setPhone($value)
 * @method $this setPrimaryLocale($value)
 * @method $this setProvince($value)
 * @method $this setProvinceCode($value)
 * @method $this setShopOwner($value)
 * @method $this setSource($value)
 * @method $this setTimezone($value)
 * @method $this setIanaTimezone($value)
 * @method $this setZip($value)
 * @method $this setGoogleAppsLoginEnabled($value)
 * @method $this setHasDiscounts($value)
 * @method $this setHasGiftCards($value)
 * @method $this setPasswordEnabled($value)
 * @method $this setPreLaunchEnabled($value)
 * @method $this setForceSsl($value)
 * @method $this setTaxShipping($value)
 * @method $this setTaxesIncluded($value)
 * @method $this setCountyTaxes($value)
 * @method $this setHasStorefront($value)
 * @method $this setSetupRequired($value)
 * @method $this setCheckoutApiSupported($value)
 * @method $this setMultiLocationEnabled($value)
 */
class Shop extends Base
{
    /**
     * @var string
     */
    protected $resourceName = 'shop';

    /**
     * @var string
     */
    protected $endpoint = 'admin/shop';

    /**
     * @var array
     */
    protected $casts = [
        'google_apps_login_enabled' => 'bool',
        'latitude' => 'float',
        'longitude' => 'float',
        'has_discounts' => 'bool',
        'has_gift_cards' => 'bool',
        'password_enabled' => 'bool',
        'pre_launch_enabled' => 'bool',
        'force_ssl' => 'bool',
        'tax_shipping' => 'bool',
        'taxes_included' => 'bool',
        'county_taxes' => 'bool',
        'has_storefront' => 'bool',
        'setup_required' => 'bool',
        'checkout_api_supported	' => 'bool',
        'multi_location_enabled	' => 'bool',
    ];

    /**
     * @throws \Exception
     *
     * @return Shop|null
     */
    public function get()
    {
        return $this->fillFromResponse(
            $this->client->performGetRequest($this->getFilledSingleEndpoint())
        );
    }
}