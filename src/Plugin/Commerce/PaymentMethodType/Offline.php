<?php

namespace Drupal\commerce_cop\Plugin\Commerce\PaymentMethodType;

use Drupal\commerce_payment\Entity\PaymentMethodInterface;
use Drupal\commerce_payment\Plugin\Commerce\PaymentMethodType\PaymentMethodTypeBase;

/**
 * Provides the offline payment method type.
 *
 * @CommercePaymentMethodType(
 *   id = "offline",
 *   label = @Translation("Offline"),
 *   create_label = @Translation("New offline"),
 * )
 */
class Offline extends PaymentMethodTypeBase {

  /**
   * {@inheritdoc}
   */
  public function buildLabel(PaymentMethodInterface $payment_method) {
    // ToDo
    $payment_gateway = $payment_method->getPaymentGateway();
    $args = [
      '@gateway_title' => $payment_gateway->label(),
    ];
    $label = $this->t('Offline payment - @gateway_title', $args);
    /*
    $configuration = $payment_gateway->get('configuration');
    $label .= '<br />' . $configuration['description'];
    */

    return $label;
  }

  /**
   * {@inheritdoc}
   */
  public function buildFieldDefinitions() {
    // Probably the fields for the Offline payments should be done in the UI.
    return [];
  }

}
