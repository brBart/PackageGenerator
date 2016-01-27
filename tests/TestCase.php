<?php

namespace WsdlToPhp\PackageGenerator\Tests;

use WsdlToPhp\PackageGenerator\Generator\Generator;
use WsdlToPhp\PackageGenerator\Tests\ConfigurationReader\GeneratorOptionsTest;

abstract class TestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Generator[]
     */
    private static $instances = array();
    /**
     * @return string
     */
    public static function wsdlPartnerPath($local = true)
    {
        return __DIR__ . sprintf('/resources/partner/PartnerService%s.wsdl', $local ? '.local' : '');
    }
    /**
     * @return string
     */
    public static function wsdlPartnerScdPath($local = true)
    {
        return __DIR__ . sprintf('/resources/partner/PartnerService%s.wsdl', $local ? '.local.scd' : '');
    }
    /**
     * @return string
     */
    public static function wsdlPartnerThirdPath($local = true)
    {
        return __DIR__ . sprintf('/resources/partner/PartnerService%s.wsdl', $local ? '.local.third' : '');
    }
    /**
     * @return string
     */
    public static function schemaPartnerPath()
    {
        return __DIR__ . '/resources/partner/PartnerService.0.xsd';
    }
    /**
     * @return string
     */
    public static function wsdlImageViewServicePath()
    {
        return __DIR__ . '/resources/image/ImageViewService.local.wsdl';
    }
    /**
     * @return string
     */
    public static function schemaImageViewServicePath()
    {
        return __DIR__ . '/resources/image/imageViewCommon.xsd';
    }
    /**
     * @return string
     */
    public static function schemaImageViewServiceAvailableImagesRequestPath()
    {
        return __DIR__ . '/resources/image/availableImagesRequest.xsd';
    }
    /**
     * @return string
     */
    public static function wsdlBingPath()
    {
        return __DIR__ . '/resources/bingsearch.wsdl';
    }
    /**
     * @return string
     */
    public static function wsdlEbayPath()
    {
        return __DIR__ . '/resources/ebaySvc.wsdl';
    }
    /**
     * @return string
     */
    public static function wsdlActonPath()
    {
        return __DIR__ . '/resources/ActonService2.local.wsdl';
    }
    /**
     * @return string
     */
    public static function wsdlOdigeoPath()
    {
        return __DIR__ . '/resources/odigeo.wsdl';
    }
    /**
     * @return string
     */
    public static function wsdlOrderContractPath()
    {
        return __DIR__ . '/resources/OrderContract.wsdl';
    }
    /**
     * @return string
     */
    public static function wsdlMyBoardPackPath()
    {
        return __DIR__ . '/resources/MyBoardPack.wsdl';
    }
    /**
     * @return string
     */
    public static function wsdlWhlPath()
    {
        return __DIR__ . '/resources/whl.wsdl';
    }
    /**
     * @return string
     */
    public static function wsdlPortalPath()
    {
        return __DIR__ . '/resources/portaplusapi.wsdl';
    }
    /**
     * @return string
     */
    public static function wsdlReformaPath()
    {
        return __DIR__ . '/resources/reformagkh.wsdl';
    }
    /**
     * @return string
     */
    public static function wsdlQueuePath()
    {
        return __DIR__ . '/resources/QueueService.wsdl';
    }
    /**
     * @return string
     */
    public static function wsdlBullhornstaffingPath()
    {
        return __DIR__ . '/resources/bullhornstaffing.local.wsdl';
    }
    /**
     * @return string
     */
    public static function wsdlOmniturePath()
    {
        return __DIR__ . '/resources/OmnitureAdminServices.wsdl';
    }
    /**
     * @return string
     */
    public static function wsdlPayPalPath()
    {
        return __DIR__ . '/resources/paypal/PayPalSvc.wsdl';
    }
    /**
     * @return string
     */
    public static function wsdlWcfPath()
    {
        return __DIR__ . '/resources/wcf/Service1.wsdl';
    }
    /**
     * @return string
     */
    public static function wsdlLnpPath()
    {
        return __DIR__ . '/resources/lnp/NumberManagement.wsdl';
    }
    /**
     * @return string
     */
    public static function wsdlEwsPath()
    {
        return __DIR__ . '/resources/ews/services.wsdl';
    }
    /**
     * @return string
     */
    public static function wsdlDirectApiCampaignsPath()
    {
        return __DIR__ . '/resources/directapi/campaigns.wsdl';
    }
    /**
     * @return string
     */
    public static function wsdlDirectApiAdGroupsPath()
    {
        return __DIR__ . '/resources/directapi/adgroups.wsdl';
    }
    /**
     * @param string $wsdlPath
     * @return Generator
     */
    private static function getGeneratorInstance($wsdlPath)
    {
        $options = GeneratorOptionsTest::optionsInstance();
        $options
            ->setOrigin($wsdlPath)
            ->setDestination(self::getTestDirectory());
        return new Generator($options);
    }
    /**
     * @return Generator
     */
    public static function getBingGeneratorInstance()
    {
        return self::getInstance(self::wsdlBingPath());
    }
    /**
     * @return Generator
     */
    public static function getOmnitureInstance()
    {
        return self::getInstance(self::wsdlOmniturePath());
    }
    /**
     * @return Generator
     */
    public static function getBullhornstaffingInstance()
    {
        return self::getInstance(self::wsdlBullhornstaffingPath());
    }
    /**
     * @return Generator
     */
    public static function getReformaInstance()
    {
        return self::getInstance(self::wsdlReformaPath());
    }
    /**
     * @return Generator
     */
    public static function getWcfInstance()
    {
        return self::getInstance(self::wsdlWcfPath());
    }
    /**
     * @return Generator
     */
    public static function getLnpInstance()
    {
        return self::getInstance(self::wsdlLnpPath());
    }
    /**
     * @return Generator
     */
    public static function getEwsInstance()
    {
        return self::getInstance(self::wsdlEwsPath());
    }
    /**
     * @return Generator
     */
    public static function getDirectApiCampaignsInstance()
    {
        return self::getInstance(self::wsdlDirectApiCampaignsPath());
    }
    /**
     * @return Generator
     */
    public static function getDirectApiAdGroupsInstance()
    {
        return self::getInstance(self::wsdlDirectApiAdGroupsPath());
    }
    /**
     * @param string $wsdlPath
     * @return Generator
     */
    public static function getInstance($wsdlPath, $reset = false)
    {
        if (!isset(self::$instances[$wsdlPath]) || $reset === true) {
            self::$instances[$wsdlPath] = self::getGeneratorInstance($wsdlPath);
        }
        return self::$instances[$wsdlPath];
    }
    /**
     * @return string
     */
    public static function getTestDirectory()
    {
        return __DIR__ . '/resources/generated/';
    }
}
