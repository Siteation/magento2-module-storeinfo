# Siteation - Magento 2 Module Store Info

[![Packagist Version](https://img.shields.io/packagist/v/siteation/magento2-module-storeinfo?style=for-the-badge)](https://packagist.org/packages/siteation/magento2-module-storeinfo)
![Supported Magento Versions](https://img.shields.io/badge/magento-%202.3_|_2.4-brightgreen.svg?logo=magento&longCache=true&style=for-the-badge)
[![Hyvä Themes Supported](https://img.shields.io/badge/Hyva_Themes-Supported-3df0af.svg?longCache=true&style=for-the-badge)](https://hyva.io/)
![License](https://img.shields.io/github/license/Siteation/magento2-module-storeinfo?color=%23234&style=for-the-badge)

This Magento 2 module adds the option to get the store information with ease.

So you can get the store phone number from the Stores > Config.
Instead using static block or hard code it in your template directly.

## Installation

Install the package via;

```bash
composer require siteation/magento2-module-storeinfo
bin/magento setup:upgrade
```

> This Module requires Magento 2.3 or higher!
> For more requirements see the `composer.json`.

## How to use

By defaut this module loads nothing.

Use one of the samples to get started.

### Adding a address block

We have made an address block that uses the store information.
And also comes with [schema tags](https://schema.org/) to enrich the Contact data.

To load the default store address block use 1 of the following xml samples
in your template.

<details open><summary>Hyva Sample</summary>

```xml
<referenceBlock name="footer-content">
    <block
        name="footer.store.info"
        as="footer-store-info"
        template="Siteation_StoreInfo::hyva/store-address.phtml"
    />
</referenceBlock>
```

</details>

<details><summary>Luma Sample</summary>

```xml
<referenceContainer name="footer">
    <block name="footer.store.info"
        as="footer-store-info"
        template="Siteation_StoreInfo::luma/store-address.phtml">
        <arguments>
            <argument name="viewModelStoreInfo" 
                xsi:type="object">Siteation\StoreInfo\ViewModel\StoreInfo</argument>
        </arguments>
    </block>
</referenceContainer>
```

</details>

### Get Store info in your own block.

First get the viewModal in your template.

_See the previous sample for the xml solution._
_And the `store-address.phtml` for on how to call the viewModal._

By default you can get the following the basic contact data
found in `general/store_information` and `trans_email/ident_general`.

[See the Wiki](https://github.com/Siteation/magento2-module-storeinfo/wiki)
on some nice use cases.
