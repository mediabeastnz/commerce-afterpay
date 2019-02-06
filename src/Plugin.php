<?php

namespace mediabeastnz\afterpay;

use mediabeastnz\afterpay\gateways\AfterPay;
use craft\commerce\services\Gateways;
use craft\events\RegisterComponentTypesEvent;
use yii\base\Event;


/**
 * Plugin represents the Afterpay gateway integration plugin.
 *
 * @author Myles Derham. <myles.derham@gmail.com>
 */
class Plugin extends \craft\base\Plugin
{

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        Event::on(Gateways::class, Gateways::EVENT_REGISTER_GATEWAY_TYPES,  function(RegisterComponentTypesEvent $event) {
            $event->types[] = AfterPay::class;
        });

    }

}
