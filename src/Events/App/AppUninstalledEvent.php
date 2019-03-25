<?php

namespace Yorkii\Shopify\Events\App;

use Yorkii\Shopify\Events\Base;
use \Carbon\Carbon;

/**
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $domain
 * @property string $province
 * @property string $country
 * @property string $address1
 * @property string $zip
 * @property string $city
 * @property string $source
 * @property string $phone
 * @property string $latitude
 * @property string $longitude
 * @property string $primary_locale
 * @property string $address2
 * @property string $country_code
 * @property string $country_name
 * @property string $currency
 * @property string $customer_email
 * @property string $timezone
 * @property string $iana_timezone
 * @property string $shop_owner
 * @property string $money_format
 * @property string $money_with_currency_format
 * @property string $weight_unit
 * @property string $province_code
 * @property string $taxes_included
 * @property string $tax_shipping
 * @property string $country_taxes
 * @property string $plan_display_name
 * @property string $plan_name
 * @property bool $has_discounts
 * @property bool $has_gift_cards
 * @property string $myshopify_domain
 * @property string $google_apps_domain
 * @property string $google_apps_login_enabled
 * @property string $money_in_emails_format
 * @property string $money_with_currency_in_emails_format
 * @property bool $eligible_for_payments
 * @property bool $requires_extra_payments_agreement
 * @property bool $password_enabled
 * @property bool $has_storefront
 * @property bool $eligible_for_card_reader_giveaway
 * @property bool $finances
 * @property int $primary_location_id
 * @property bool $checkout_api_supported
 * @property bool $multi_location_enabled
 * @property bool $setup_required
 * @property bool $force_ssl
 * @property bool $pre_launch_enabled
 * 
 * @method Carbon getCreatedAt()
 * @method Carbon getUpdatedAt()
 * @method int getId()
 * @method string getName()
 * @method string getEmail()
 * @method string getDomain()
 * @method string getProvince()
 * @method string getCountry()
 * @method string getAddress1()
 * @method string getZip()
 * @method string getCity()
 * @method string getSource()
 * @method string getPhone()
 * @method string getLatitude()
 * @method string getLongitude()
 * @method string getPrimaryLocale()
 * @method string getAddress2()
 * @method string getCountryCode()
 * @method string getCountryName()
 * @method string getCurrency()
 * @method string getCustomerEmail()
 * @method string getTimezone()
 * @method string getIanaTimezone()
 * @method string getShopOwner()
 * @method string getMoneyFormat()
 * @method string getMoneyWithCurrencyFormat()
 * @method string getWeightUnit()
 * @method string getProvinceCode()
 * @method string getTaxesIncluded()
 * @method string getTaxShipping()
 * @method string getCountryTaxes()
 * @method string getPlanDisplayName()
 * @method string getPlanName()
 * @method bool getHasDiscounts()
 * @method bool getHasGiftCards()
 * @method string getMyshopifyDomain()
 * @method string getGoogleAppsDomain()
 * @method string getGoogleAppsLoginEnabled()
 * @method string getMoneyInEmailsFormat()
 * @method string getMoneyWithCurrencyInEmailsFormat()
 * @method bool getEligibleForPayments()
 * @method bool getRequiresExtraPaymentsAgreement()
 * @method bool getPasswordEnabled()
 * @method bool getHasStorefront()
 * @method bool getEligibleForCardReaderGiveaway()
 * @method bool getFinances()
 * @method int getPrimaryLocationId()
 * @method bool getCheckoutApiSupported()
 * @method bool getMultiLocationEnabled()
 * @method bool getSetupRequired()
 * @method bool getForceSsl()
 * @method bool getPreLaunchEnabled()
 */
class AppUninstalledEvent extends Base
{
    const EVENT_TOPIC = 'app/uninstalled';

    /**
     * @var array
     */
    protected $casts = [
        'has_discounts' => 'bool',
        'has_gift_cards' => 'bool',
        'eligible_for_payments' => 'bool',
        'requires_extra_payments_agreement' => 'bool',
        'password_enabled' => 'bool',
        'has_storefront' => 'bool',
        'eligible_for_card_reader_giveaway' => 'bool',
        'finances' => 'bool',
        'checkout_api_supported' => 'bool',
        'multi_location_enabled' => 'bool',
        'setup_required' => 'bool',
        'force_ssl' => 'bool',
        'pre_launch_enabled' => 'bool',
    ];
}