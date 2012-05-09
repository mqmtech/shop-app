<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new JMS\AopBundle\JMSAopBundle(),
            new JMS\DiExtraBundle\JMSDiExtraBundle($this),
            new JMS\SecurityExtraBundle\JMSSecurityExtraBundle(),
            new MQM\ShopBundle\MQMShopBundle(),
            new MQM\ToolsBundle\MQMToolsBundle(),
            new MQM\SortBundle\MQMSortBundle(),
            new MQM\PaginationBundle\MQMPaginationBundle(),
            new MQM\UserBundle\MQMUserBundle(),
            new MQM\OrderBundle\MQMOrderBundle(),
            new MQM\ShoppingCartBundle\MQMShoppingCartBundle(),
            new MQM\ImageBundle\MQMImageBundle(),
            new MQM\BrandBundle\MQMBrandBundle(),
            new MQM\CategoryBundle\MQMCategoryBundle(),
            new MQM\ProductBundle\MQMProductBundle(),
            new MQM\StatisticBundle\MQMStatisticBundle(),
            new MQM\PricingBundle\MQMPricingBundle(),
            new MQM\UpgradeBundle\MQMUpgradeBundle(),
            new MQM\CheckoutBundle\MQMCheckoutBundle(),
            new MQM\TaxationBundle\MQMTaxationBundle(),
            new MQM\MonetaryBundle\MQMMonetaryBundle(),
            new MQM\AssetBundle\MQMAssetBundle(),
            new \FOS\FacebookBundle\FOSFacebookBundle(),
            new \FOS\TwitterBundle\FOSTwitterBundle(),
            new \AntiMattr\GoogleBundle\GoogleBundle()
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Acme\DemoBundle\AcmeDemoBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
