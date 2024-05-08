<?php
/**
 * Copyright since 2007 PrestaShop SA and Contributors
 * PrestaShop is an International Registered Trademark & Property of PrestaShop SA
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License 3.0 (AFL-3.0)
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright Since 2007 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 */
class AdminConfigurePaymentWesternbidController extends ModuleAdminController
{
    public function __construct()
    {
        $this->bootstrap = true;
        $this->className = 'Configuration';
        $this->table = 'configuration';

        parent::__construct();

        if (empty(Currency::checkPaymentCurrencies($this->module->id))) {
            $this->warnings[] = $this->l('No currency has been set for this module.');
        }

        $this->fields_options = [
            $this->module->name => [
                'fields' => [
                    Westernbid_Starter::STARTER_WB_ENABLED => [
                        'type' => 'bool',
                        'title' => $this->l('Allow payment'),
                        'validation' => 'isBool',
                        'cast' => 'intval',
                        'required' => false,
                    ],
                    Westernbid_Starter::STARTER_WB_LOGIN => [
                        'type' => 'text',
                        'title' => $this->l('Western bid LOGIN'),
                        'required' => true,
                    ],

                    Westernbid_Starter::STARTER_WB_SECRETKEY => [
                        'type' => 'text',
                        'title' => $this->l('Western bid SECRET KEY'),
                        'required' => true,
                    ],

                ],
                'submit' => [
                    'title' => $this->l('Save'),
                ],
            ],
        ];
    }
}
