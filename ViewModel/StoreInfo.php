<?php

declare(strict_types=1);

namespace Siteation\StoreInfo\ViewModel;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class StoreInfo implements ArgumentInterface
{
    protected $scopeConfig;

    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
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

    public function getRegionId(): string
    {
        return (string) $this->getStoreInfo('region_id');
    }

    public function getStreetLine1(): string
    {
        return (string) $this->getStoreInfo('street_line1');
    }

    public function getStreetLine2(): string
    {
        return (string) $this->getStoreInfo('street_line2');
    }

    /** @deprecated use `getEmail` instead, will be removed in v2 */
    public function getEmailUs(): string
    {
        return (string) $this->getTransEmail('email');
    }
}
