<?php

namespace Yorki\Shopify\Resources\Customers;

use Yorki\Shopify\Resources\BaseResource;
use Yorki\Shopify\Resources\Traits\Depends;

/**
 * @property string $address1
 * @property string $address2
 * @property string $city
 * @property string $country
 * @property string $country_code
 * @property string $country_name
 * @property string $company
 * @property string $first_name
 * @property string $last_name
 * @property string $name
 * @property string $phone
 * @property string $province
 * @property string $province_code
 * @property string $zip
 * 
 * @method string getAddress1()
 * @method string getAddress2()
 * @method string getCity()
 * @method string getCountry()
 * @method string getCountryCode()
 * @method string getCountryName()
 * @method string getCompany()
 * @method string getFirstName()
 * @method string getLastName()
 * @method string getName()
 * @method string getPhone()
 * @method string getProvince()
 * @method string getProvinceCode()
 * @method string getZip()
 * 
 * @method $this setAddress1($address1)
 * @method $this setAddress2($address2)
 * @method $this setCity($city)
 * @method $this setCountry($country)
 * @method $this setCountryCode($countryCode)
 * @method $this setCountryName($countryName)
 * @method $this setCompany($company)
 * @method $this setFirstName($firstName)
 * @method $this setLastName($lastName)
 * @method $this setName($name)
 * @method $this setPhone($phone)
 * @method $this setProvince($province)
 * @method $this setProvinceCode($provinceCode)
 * @method $this setZip($zip)
 */
class CustomerAddress extends BaseResource
{
    use Depends;

    /**
     * @var string
     */
    protected $resourceName = 'customer_address';

    /**
     * @var string
     */
    protected $endpoint = 'admin/customers/:customer_id/addresses';

    /**
     * @var array
     */
    protected $depends = [
        'customer_id'
    ];

    /**
     * @throws \Exception
     *
     * @return bool
     */
    public function defaultAddress()
    {
        $response = $this->client->performPutRequest(
            $this->getFilledSingleEndpoint(null, '/default.json')
        );

        return $response->getStatusCode() === 200;
    }
}