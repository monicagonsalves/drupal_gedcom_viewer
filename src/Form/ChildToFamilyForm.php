<?php

namespace Drupal\family_tree_generator\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for Child to family edit forms.
 *
 * @ingroup family_tree_generator
 */
class ChildToFamilyForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    /* @var $entity \Drupal\family_tree_generator\Entity\ChildToFamily */
    $form = parent::buildForm($form, $form_state);
    $entity = $this->entity;

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $entity = $this->entity;
    $status = parent::save($form, $form_state);

    switch ($status) {
      case SAVED_NEW:
        drupal_set_message($this->t('Created the %label Child to family.', [
          '%label' => $entity->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Child to family.', [
          '%label' => $entity->label(),
        ]));
    }
    $form_state->setRedirect('entity.child_to_family.canonical', ['child_to_family' => $entity->id()]);
  }

}
