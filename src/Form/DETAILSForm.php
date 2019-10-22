<?php
/**
 * @file
 * Contains \Drupal\details\Form\DETAILSForm
 */
namespace Drupal\details\Form;

use Drupal\Core\Database\Database;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\node\Entity\Node;
use Drupal\node\Entity\NodeType;


/**
 * Provides details
 */
class DETAILSForm extends FormBase {
    /**
     * (@inheritdoc)
     */
  public function getFormId(){
    return 'details_email_form';
  }
  public function buildForm(array $form, FormStateInterface $form_state){
    $node = \Drupal::routeMatch()->getParameter('node');
    $types = \Drupal::entityTypeManager()->getStorage('node_type')->loadMultiple();
    //print_r($types);
    $type = NodeType::loadMultiple();
    //print_r(array_keys($type)); die();
    foreach ($type as $key => $value) {
      $val[$key] = $key;
    }  

    $form['node_value'] = array(
      '#title' => t('No. of Nodes(Integer)'),
      '#type' => 'number',
      '#size' => 2,
      '#required' => TRUE,
    );
    $form['content_type'] = array(
      '#title' =>t('Content Type'),
      '#type' =>'select',
      '#options' => [
          $val
       ]
    );
    $form['title'] = array(
      '#title' => t('Title'),
      '#type' => 'textfield',
      '#size' => 10,
      '#required' => TRUE,
    );
    $form['body'] = array(
      '#title' => t('Body'),
      '#type' => 'textarea',
      '#size' => 50,
      '#required' => TRUE,
    );
        
    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => t('Submit'),
    );
    return $form;
    }
    /**
     * (@inheritdoc)
     */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $value = $form_state->getValue('node_value');
    if ($value > 5) {
      $form_state->setErrorByName ('node_value', t('Node value should not be greater than 5'));
      }
   }
  public function submitForm(array &$form, FormStateInterface $form_state){
    drupal_set_message(t('Yours details are saved and nodes has been created.'));
      $value = $form_state->getValue('node_value');
      $value1 = $form_state->getValue('content_type');
      
      for ($x = 1; $x < $value; $x++) {
        $my_article = Node::create(['type' => $value1]);
        $my_article->set('title', $form_state->getValue('title'));
        $my_article->set('body', $form_state->getValue('body'));
        $my_article->enforceIsNew();
        $my_article->save();
    }    
  }
}
