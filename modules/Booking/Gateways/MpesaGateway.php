<?php
namespace Modules\Booking\Gateways;

use App\Currency;
use Illuminate\Http\Request;
use Mockery\Exception;
use Modules\Booking\Events\BookingUpdatedEvent;
use Modules\Booking\Models\Booking;
use Modules\Booking\Models\Payment;
use Omnipay\Omnipay;
use Omnipay\PayPal\ExpressGateway;
use Illuminate\Support\Facades\Log;

class PaypalGateway extends BaseGateway
{
  protected $id = 'stripe_checkout';

  public $name = 'Stripe Checkout V2';

  protected $gateway;

  public function getOptionsConfigs()
  {
      return [
          [
              'type'  => 'checkbox',
              'id'    => 'enable',
              'label' => __('Enable Mpesa Checkout?')
          ],
          [
              'type'  => 'input',
              'id'    => 'name',
              'label' => __('Custom Name'),
              'std'   => __("Mpesa"),
              'multi_lang' => "1"
          ],
          [
              'type'  => 'upload',
              'id'    => 'logo_id',
              'label' => __('Custom Logo'),
          ],
          [
              'type'  => 'editor',
              'id'    => 'html',
              'label' => __('Custom HTML Description'),
              'multi_lang' => "1"
          ],
          [
              'type'       => 'input',
              'id'        => 'mpesa_secret_key',
              'label'     => __('Secret Key'),
          ],
          [
              'type'       => 'input',
              'id'        => 'mpesa_consumer_key',
              'label'     => __('Consumer Key'),
          ],
          [
              'type'       => 'checkbox',
              'id'        => 'stripe_enable_sandbox',
              'label'     => __('Enable Sandbox Mode'),
          ],
          [
              'type'       => 'input',
              'id'        => 'mpesa_till',
              'label'     => __('Test Secret Key'),
          ],
          [
              'type'       => 'input',
              'id'        => 'stripe_test_publishable_key',
              'label'     => __('Test Publishable Key'),
          ],
          [
              'type'       => 'input',
              'id'        => 'endpoint_secret',
              'label'     => __('Endpoint Secret for Webhooks'),
          ]
      ];
  }

}
