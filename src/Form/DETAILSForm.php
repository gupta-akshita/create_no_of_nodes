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
        $nid = $node->nid->value;
        $form['node_value'] = array(
            '#title' => t('No. of Nodes(Integer)'),
            '#type' => 'number',
            '#size' => 2,
            '#description' => t("No of Nodes"),
            '#required' => TRUE,
        );
        $form['content_type'] = array(
           '#title' =>t('Content Type'),
           '#type' =>'select',
           '#options' => [
               '1' => $this->t('Article'),
               '2' => $this->t('Basic Page'),
           ]
       );
        $form['title'] = array(
            '#title' => t('Title'),
            '#type' => 'textfield',
            '#size' => 10,
            '#description' => t("Title"),
            '#required' => TRUE,
        );
        $form['body'] = array(
            '#title' => t('Body'),
            '#type' => 'textarea',
            '#size' => 50,
            '#description' => t("Title"),
            '#required' => TRUE,
        );
        
        $form['submit'] = array(
            '#type' => 'submit',
            '#value' => t('Show'),
        );
        $form['nid'] = array(
            '#type' => 'hidden',
            '#value' => $nid,
        );
        return $form;
    }
    /**
     * (@inheritdoc)
     */
    public function validateForm(array &$form, FormStateInterface $form_state) {
        $value = $form_state->getValue('node_value');
        if ($value >= 5) {
            $form_state->setErrorByName ('node_value', t('Node value should not be greater than 5'));
        }
    }
    public function submitForm(array &$form, FormStateInterface $form_state){
        drupal_set_message(t('Yours details are saved and nodes has been created.'));
        $value = $form_state->getValue('node_value');

        for ($x = 0; $x <= $value; $x++) {
            $my_article = Node::create(['type' => 'article']);
            $my_article->set('title', $form_state->getValue('title'));
            $my_article->set('body', $form_state->getValue('body'));
            $my_article->enforceIsNew();
            $my_article->save();
        }    
    }
}