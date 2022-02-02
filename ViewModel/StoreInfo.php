<?php declare(strict_types=1);

namespace Siteation\StoreInfo\ViewModel;

use Magento\Directory\Model\CountryFactory;
use Magento\Directory\Model\ResourceModel\Region\Collection  as RegionCollection;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Store\Model\ScopeInterface;

class StoreInfo implements ArgumentInterface
{
    protected $countryFactory;
    protected $regionCollection;
    protected $scopeConfig;

    public function __construct(
        CountryFactory $countryFactory,
        RegionCollection $regionCollection,
        ScopeConfigInterface $scopeConfig
    ) {
        $this->countryFactory = $countryFactory;
        $this->regionCollection = $regionCollection;
        $this->scopeConfig = $scopeConfig;
    }

    private function getCountryNameById($countryId): string
    {
        $countryName = '';
        $country = $this->countryFactory->create()->loadByCode($countryId);

        if ($country) {
            $countryName = $country->getName();
        }

        return $countryName;
    }

    private function getRegionNameById(int $id): string
    {
        $regionName = '';
        $region = $this->regionCollection->getItemById($id);

        if ($region) {
            $regionName = $region->getName();
        }

        return $regionName;
    }

    /**
     * Get store information
     *
     * @param string $attribute
     * @return mixed
     */
    public function getStoreInfo(string $attribute)
    {
        $path = sprintf('general/store_information/%s', $attribute);
        return $this->scopeConfig->getValue($path, ScopeInterface::SCOPE_STORE);
    }

    /**
     * Get store emails
     *
     * @param string $attribute
     * @return mixed
     */
    public function getTransEmail(string $attribute)
    {
        $path = sprintf('trans_email/ident_general/%s', $attribute);
        return $this->scopeConfig->getValue($path, ScopeInterface::SCOPE_STORE);
    }

    public function getStoreName(): string
    {
        return (string) $this->getStoreInfo('name');
    }

    public function getPhoneNumber(): string
    {
        return (string) $this->getStoreInfo('phone');
    }

    public function getEmail(): string
    {
        return (string) $this->getTransEmail('email');
    }

    public function getOpeningHours(): string
    {
        return (string) $this->getStoreInfo('hours');
    }

    public function getPostcode(): string
    {
        return (string) $this->getStoreInfo('postcode');
    }

    public function getCity(): string
    {
        return (string) $this->getStoreInfo('city');
    }

    public function getCountryId(): string
    {
        return (string) $this->getStoreInfo('country_id');
    }

    public function getCountry(): string
    {
        return (string) $this->getCountryNameById($this->getCountryId());
    }

    public function getRegionId(): string
    {
        return (string) $this->getStoreInfo('region_id');
    }

    public function getRegion(): string
    {
        $id = $this->getRegionId();

        if (is_numeric($id)) {
            return (string) $this->getRegionNameById(intval($id));
        }

        return (string) $id;
    }

    public function getStreetLine1(): string
    {
        return (string) $this->getStoreInfo('street_line1');
    }

    public function getStreetLine2(): string
    {
        return (string) $this->getStoreInfo('street_line2');
    }

    public function getVatNumber(): string
    {
        return (string) $this->getStoreInfo('merchant_vat_number');
    }

    /** @deprecated use `getEmail` instead, will be removed in v2 */
    public function getEmailUs(): string
    {
        return (string) $this->getTransEmail('email');
    }
}
