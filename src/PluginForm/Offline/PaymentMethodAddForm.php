<?php

namespace Drupal\commerce_cop\PluginForm\Offline;

use Drupal\commerce_payment\PluginForm\PaymentMethodAddForm as BasePaymentMethodAddForm;
use Drupal\Core\Form\FormStateInterface;

class PaymentMethodAddForm extends BasePaymentMethodAddForm {

  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    $form = parent::buildConfigurationForm($form, $form_state);

    // Get the Payment Gateway configuration.
    $configuration = $this->entity->getPaymentGateway()->get('configuration');

    if (!empty($configuration['description'])) {
      $form['payment_details']['description'] = [
        '#markup' => $configuration['description'],
      ];
    }

    if (!empty($configuration['information'])) {
      $form['payment_details']['information'] = [
        '#markup' => check_markup($configuration['information']['value'], $configuration['information']['format']),
      ];
    }

    // Dummy key element for the offline payment.
    $form['payment_details']['key'] = [
      '#type' => 'value',
      '#value' => 'no-value',
    ];

    return $form;
  }

}
