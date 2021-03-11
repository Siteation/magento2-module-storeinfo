# Siteation - Magento 2 Module Store Info

[![Packagist Version](https://img.shields.io/packagist/v/siteation/magento2-module-storeinfo)](https://packagist.org/packages/siteation/magento2-module-storeinfo)
![Supported Magento Versions](https://img.shields.io/badge/magento-%202.3_|_2.4-brightgreen.svg?logo=magento&longCache=true)
[![Compatible with Hyva](https://img.shields.io/badge/Compatible_with-Hyva-3df0af.svg?longCache=true)](https://hyva.io/)

This Magento 2 module add the option to get the store info with ease.

So you can get the store phone number from the Stores > Config.
Instead using static block or hard code it in your template directly.

<details><summary><strong>TOC</strong></summary>

- [Installation](#installation)
- [How to use](#how-to-use)
  - [Get address block](#get-address-block)
  - [Get Store info in your own block.](#get-store-info-in-your-own-block)

</details>

## Installation

Install the package via;

```bash
composer require siteation/magento2-module-storeinfo
bin/magento setup:upgrade
```

> This Module require Magento 2.3 or higher!
> For more requirements see the `composer.json`.

## How to use

By defaut this module loads nothing.

Use one of the samples to get started.

### Get address block

We have made an address block that uses the store information.
And also comes [schema tags](https://schema.org/) to enrich the Contact data.

To load the default store address block use 1 of the following xml samples
in your template.

```xml
<!-- Luma Sample -->
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
<!-- Hyva Sample -->
<referenceContainer name="footer">
    <block
        name="footer.store.info"
        as="footer-store-info"
        template="Siteation_StoreInfo::hyva/store-address.phtml"
    />
</referenceContainer>
```

### Get Store info in your own block.

First get the viewmodal in your template.

_See the previous sample for the xml solution._
_And the `store-address.phtml` for on how to call the viewmodal._

By default you can get the following the basic contact data
found in `general/store_information` and `trans_email/ident_general`.

[See the Wiki](https://github.com/Siteation/magento2-module-storeinfo/wiki)
on some nice use cases.
