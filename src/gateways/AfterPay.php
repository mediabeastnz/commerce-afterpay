<?php

namespace mediabeastnz\afterpay\gateways;

use Craft;
use craft\commerce\base\RequestResponseInterface;
use craft\commerce\omnipay\base\OffsiteGateway;
use Omnipay\Common\AbstractGateway;
use Omnipay\Omnipay;
use Omnipay\AfterPay\Gateway as Gateway;
use yii\base\NotSupportedException;

/**
 * Gateway represents Afterpay gateway
 *
 * @author    Myles Derham. <myles.derham@gmail.com>
 */

class AfterPay extends OffsiteGateway
{
    // Properties
    // =========================================================================
    /**
     * @var string
     */
    public $merchantId;
        /**
     * @var string
     */
    public $merchantSecret;
    /**
     * @var bool
     */
    public $testMode = false;

    // Public Methods
    // =========================================================================
    
    /**
     * @inheritdoc
     */
    public static function displayName(): string
    {
        return Craft::t('commerce', 'Afterpay');
    }

    /**
     * @inheritdoc
     */
    public function getSettingsHtml()
    {
        return Craft::$app->getView()->renderTemplate('craft-commerce-afterpay/gatewaySettings', ['gateway' => $this]);
    }

    /**
     * @inheritdoc
     */
    public function supportsPaymentSources(): bool
    {
        return false;
    }
    
    // Protected Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    protected function createGateway(): AbstractGateway
    {
        /** @var Gateway $gateway */
        $gateway = Omnipay::create($this->getGatewayClassName());
        $gateway->setMerchantId($this->merchantId);
        $gateway->setMerchantSecret($this->merchantSecret);
        return $gateway;
    }

    /**
     * @inheritdoc
     */
    protected function getGatewayClassName()
    {
        return '\\'.Gateway::class;
    }

}