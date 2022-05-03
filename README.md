# YouTube NoCookie for Magento 2
YouTube NoCookie for Magento 2 makes sure that all YouTube product videos are always inserted via the cookie-free domain youtube-nocookie.com. It tries to detect all possible YouTube URLs for that and adapt the URL accordingly to always be compliant with the current EU rules.

## Compatibility
* Magento >= 2.3

## Installation Instructions
The installation procedure highly depends on your setup. In any case, you should use a version control system like git and test the installation on a development system.

### Composer Installation
1. `composer require customgento/module-youtube-no-cookie-m2`
2. `bin/magento module:enable CustomGento_YouTubeNoCookie`
3. `bin/magento setup:upgrade`
4. `bin/magento setup:di:compile`
5. `bin/magento cache:flush`

### Manual Installation
1. unzip the downloaded files
2. create the directory `app/code/CustomGento/YouTubeNoCookie/`: `mkdir -p app/code/CustomGento/YouTubeNoCookie/`
3. copy the unzipped files to the newly created directory `app/code/CustomGento/YouTubeNoCookie/`
4. `bin/magento module:enable CustomGento_YouTubeNoCookie`
5. `bin/magento setup:upgrade`
6. `bin/magento setup:di:compile`
7. `bin/magento cache:flush`

## Uninstallation
The uninstallation procedure depends on your setup:

### Uninstallation After Composer Installation
1. `bin/magento module:uninstall CustomGento_YouTubeNoCookie`
2. `bin/magento setup:di:compile`
3. `bin/magento cache:flush`

### Uninstallation After Manual Installation
1. `bin/magento module:disable CustomGento_YouTubeNoCookie`
2. `bin/magento setup:di:compile`
3. `bin/magento cache:flush`
4. `rm -r app/code/CustomGento/YouTubeNoCookie`

## Support
If you have any issues with this extension, feel free to [open an issue on GitHub](https://github.com/customgento/module-youtube-no-cookie-m2/issues).

## Licence
[Open Software License 3.0](https://opensource.org/licenses/OSL-3.0)

## Copyright
(c) 2020 - present CustomGento GmbH
