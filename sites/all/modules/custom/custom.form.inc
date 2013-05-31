<?php
/**
 * @file
 * Inc file whith form alter
 */
/**
 * implimentation of hook_form_alter()
 */
function custom_form_alter(&$form, &$form_state, $form_id) {
    //Nothing here
}
// add all custom_form_FORM_ID_alter() functions bellow ...

/**
 * Hide label and first --ALL-- item
 * Implement hook_form_ID_alter()
 * @param type $form
 * @param type $form_state
 * @param type $form_id
 */

function custom_form_views_exposed_form_alter(&$form, &$form_state, $form_id) {

    if ($form_id == 'views_exposed_form' && $form_state['view']->name == 'catalog') {
            $form['#info']['filter-tid']['label'] = t('');
            $form['tid']['#options']['All'] = t('');
    }
    
    if($form_id == 'views_exposed_form' && $form_state['view']->name == 'Accessories'){
        
        $path = $GLOBALS['base_root'] . '/products';
        $form['link'] = array(
          '#type' => 'item',
          '#title' => '',
          '#markup' => '<span class="products_link"><a href="' . $path . '">Pendants</a></span>', 
          '#weight' => 0,  
        );
    }
    
    if($form_id == 'views_exposed_form' && $form_state['view']->name == 'products'){
        $form['reset']['#value'] = 'Reset filter';
        
        $path = $GLOBALS['base_root'] . '/accessories';
        $form['link'] = array(
          '#type' => 'item',
          '#title' => '',
          '#markup' => '<span class="products_link"><a href="' . $path . '">Аccessories</a></span>', 
          '#weight' => 2,  
        );
    }

    /*if ($form_id == 'views_exposed_form' && $form_state['view']->name == 'products') {   
        foreach ($form['term_node_tid_depth']['#options'] as $option) {
            foreach ($option->option as $filter_tid => $id) {
                $nodes = taxonomy_select_nodes($filter_tid);
                if (empty($nodes)) {
                    // do something
                }
                
            }
        }
    }*/
    
   return $form;
}

/**
 * Implement hook_theme()
 * @param type $vars
 * @return string
 */
function nickandersonart_select_as_links($vars) {
  $element = $vars['element'];

  $output = '';
  $name = $element['#name'];

  // Collect selected values so we can properly style the links later
  $selected_options = array();
  if (empty($element['#value'])) {
    if (!empty($element['#default_values'])) {
      $selected_options[] = $element['#default_values'];
    }
  }
  else {
    $selected_options[] = $element['#value'];
  }

  // Add to the selected options specified by Views whatever options are in the
  // URL query string, but only for this filter
  $urllist = parse_url(request_uri());
  if (isset($urllist['query'])) {
    $query = array();
    parse_str(urldecode($urllist['query']), $query);
    foreach ($query as $key => $value) {
      if ($key != $name) {
        continue;
      }
      if (is_array($value)) {
        // This filter allows multiple selections, so put each one on the selected_options array
        foreach ($value as $option) {
          $selected_options[] = $option;
        }
      }
      else {
        $selected_options[] = $value;
      }
    }
  }

  // Clean incoming values to prevent XSS attacks
  if (is_array($element['#value'])) {
    foreach ($element['#value'] as $index => $item) {
      unset($element['#value'][$index]);
      $element['#value'][filter_xss($index)] = filter_xss($item);
    }
  }
  elseif (is_string($element['#value'])) {
    $element['#value'] = filter_xss($element['#value']);
  }

  // Go through each filter option and build the appropriate link or plain text
  foreach ($element['#options'] as $option => $elem) {
    // Check for Taxonomy-based filters
    if (is_object($elem)) {
      $slice = array_slice($elem->option, 0, 1, TRUE);
      list($option, $elem) = each($slice);
    }
    
    $element_set = array();
    if (is_array($elem)) {
      $element_set = $elem;
    }
    else {
      $element_set[$option] = $elem;
    }

    $links = array();
    $multiple = !empty($element['#multiple']);

    foreach ($element_set as $key => $value) {
      // Custom ID for each link based on the <select>'s original ID
      $id = drupal_html_id($element['#id'] . '-' . $key);
      $elem = array(
        '#id' => $id,
        '#markup' => '',
        '#type' => 'bef-link',
        '#name' => $id,
        '#children' => '',
      );
      if (array_search($key, $selected_options) === FALSE) {

      $qur = db_select('taxonomy_term_data', 't')
                ->fields('t', array('tid'))
                ->condition('t.name', $value, '=')
                ->execute()
                ->fetchField();
      
      $q = (taxonomy_term_load($qur));
            if ($q != FALSE) {
              // Get term id from database and rendering image  
              $image = render(field_view_field('taxonomy_term', $q, 'uc_catalog_image', $display = array()));
              $elem['#children']  = '<div class="cat_filter_image">';
              $elem['#children']  .= '<a href=" ' . current_path() . '?tid=' . $qur . '">';
              $elem['#children'] .= $image;
              $elem['#children'] .= '<a>'; 
              $elem['#children'] .= '</div>';
            }
           
        $elem['#children'] .= l($value, bef_replace_query_string_arg($name, $key, $multiple));
        $output .= theme('form_element', array('element' => $elem));
        
      } 
        elseif ($element['#value'] != 'All') {
              // Get term id from database and rendering image    
              $qi = (taxonomy_term_load($element['#value']));
              $image = render(field_view_field('taxonomy_term', $qi, 'uc_catalog_image', $display = array()));
              $elem['#children']  = '<div class="cat_filter_image">';         
              $elem['#children'] .= $image;
              $elem['#children'] .= '</div>';
            
        $elem['#children'] .= l($value, bef_replace_query_string_arg($name, $key, $multiple, TRUE));
        _form_set_class($elem, array('bef-select-as-links-selected'));
        $output .= str_replace('form-item', 'form-item selected', theme('form_element', array('element' => $elem)));
      }
    }
  }

  $properties = array(
    '#description' => isset($element['#bef_description']) ? $element['#bef_description'] : '',
    '#children' => $output,
  );

  $output = '<div class="bef-select-as-links">';
  $output .= theme('form_element', array('element' => $properties));
  if (!empty($element['#value'])) {
    if (is_array($element['#value'])) {
      foreach ($element['#value'] as $value) {
        $output .= '<input type="hidden" name="' . $name . '[]" value="' . $value . '" />';
      }
    }
    else {
      $output .= '<input type="hidden" name="' . $name . '" value="' . $element['#value'] . '" />';
    }
  }
  $output .= '</div>';
  return $output;
}

/**
 * Implementation hook_form_ID_alter()
 * @param type $form
 * @param type $form_state
 * @param type $form_id
 * @return string
 */
function custom_form_search_block_form_alter(&$form, &$form_state, $form_id) {
    if ($form_id == 'search_block_form') {
        $form['search_block_form']['#title'] = t('Search');
        $form['search_block_form']['#title_display'] = 'invisible';
        $form['search_block_form']['#default_value'] = t('Search');
        $form['search_block_form']['#attributes']['onblur'] = "if (this.value == '') {this.value = 'Search';}";
        $form['search_block_form']['#attributes']['onfocus'] = "if (this.value == 'Search') {this.value = '';}";
    }
    return $form;
}

function custom_form_user_register_form_alter(&$form, &$form_state, $form_id) {
    $form['account']['mail']['#default_value'] = t('Email Signup');
    $form['account']['mail']['#attributes']['onblur'] = "if (this.value == '') {this.value = 'Email Signup';}";
    $form['account']['mail']['#attributes']['onfocus'] = "if (this.value == 'Email Signup') {this.value = '';}";
    //var_dump($form);
    //die();
    return $form; 
}

/**
 * Implementtation hook_form_ID_alter() 
 * 
 * @param array $form
 * @param type $form_state
 * @param type $form_id
 */
function custom_form_webform_client_form_10_alter(&$form, &$form_state, $form_id) {
    $form['actions']['submit']['#value'] = 'send message';
    $form['#submit'] = array('webform_client_form_pages', 'custom_form_webform_client_submit');
}
/**
 * Implementtation hook_form_ID_alter()
 * @param type $form
 * @param type $form_state
 * @param type $form_id
 */
function custom_form_mailchimp_lists_user_subscribe_form_users_mail_list_alter(&$form, &$form_state, $form_id) {
    $form['mailchimp_lists']['mailchimp_users_mail_list']['mergevars']['EMAIL']['#default_value'] = t('Email Signup');
    $form['mailchimp_lists']['mailchimp_users_mail_list']['mergevars']['EMAIL']['#attributes']['onblur'] = "if (this.value == '') {this.value = 'Email Signup';}";
    $form['mailchimp_lists']['mailchimp_users_mail_list']['mergevars']['EMAIL']['#attributes']['onfocus'] = "if (this.value == 'Email Signup') {this.value = '';}";
    $form['mailchimp_lists']['mailchimp_users_mail_list']['title']['#markup'] = '';
    $form['mailchimp_lists']['mailchimp_users_mail_list']['mergevars']['EMAIL']['#title'] = '';
    $form['mailchimp_lists']['mailchimp_users_mail_list']['mergevars']['EMAIL']['#required'] = FALSE;
    $form['mailchimp_lists']['mailchimp_users_mail_list']['mergevars']['LNAME']['#type'] = 'hidden';
    $form['mailchimp_lists']['mailchimp_users_mail_list']['mergevars']['FNAME']['#type'] = 'hidden';
}

/**
 * I just rewrite submit function from webform module
 * @global type $user
 * @param type $form
 * @param type $form_state
 * @return type
 */
function custom_form_webform_client_submit($form, &$form_state){
 module_load_include('inc', 'webform', 'includes/webform.submissions');
  module_load_include('inc', 'webform', 'includes/webform.components');
  global $user;
  
  if (empty($form_state['save_draft']) && empty($form_state['webform_completed'])) {
    return;
  }

  $node = $form['#node'];
  $sid = $form_state['values']['details']['sid'] ? (int) $form_state['values']['details']['sid'] : NULL;

  // Check if user is submitting as a draft.
  $is_draft = (int) !empty($form_state['save_draft']);

  if (!$sid) {
    // Create a new submission object.
    $submission = (object) array(
      'nid' => $node->nid,
      'uid' => $form_state['values']['details']['uid'],
      'submitted' => REQUEST_TIME,
      'remote_addr' => ip_address(),
      'is_draft' => $is_draft,
      'data' => webform_submission_data($node, $form_state['values']['submitted']),
    );
  }
  else {
    // To maintain time and user information, load the existing submission.
    $submission = webform_get_submission($node->webform['nid'], $sid);
    $submission->is_draft = $is_draft;

    // Merge with new submission data. The + operator maintains numeric keys.
    // This maintains existing data with just-submitted data when a user resumes
    // a submission previously saved as a draft.
    $new_data = webform_submission_data($node, $form_state['values']['submitted']);
    $submission->data = $new_data + $submission->data;
  }

  // If there is no data to be saved (such as on a multipage form with no fields
  // on the first page), process no further. Submissions with no data cannot
  // be loaded from the database as efficiently, so we don't save them at all.
  if (empty($submission->data)) {
    return;
  }

  // Save the submission to the database.
  if (!$sid) {
    // No sid was found thus insert it in the dataabase.
    $form_state['values']['details']['sid'] = $sid = webform_submission_insert($node, $submission);
    $form_state['values']['details']['is_new'] = TRUE;

    // Set a cookie including the server's submission time.
    // The cookie expires in the length of the interval plus a day to compensate for different timezones.
    if (variable_get('webform_use_cookies', 0)) {
      $cookie_name = 'webform-' . $node->nid;
      $time = REQUEST_TIME;
      $params = session_get_cookie_params();
      setcookie($cookie_name . '[' . $time . ']', $time, $time + $node->webform['submit_interval'] + 86400, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }

    // Save session information about this submission for anonymous users,
    // allowing them to access or edit their submissions.
    if (!$user->uid && user_access('access own webform submissions')) {
      $_SESSION['webform_submission'][$form_state['values']['details']['sid']] = $node->nid;
    }
  }
  else {
    // Sid was found thus update the existing sid in the database.
    webform_submission_update($node, $submission);
    $form_state['values']['details']['is_new'] = FALSE;
  }

  // Check if this form is sending an email.
  if (!$is_draft && !$form_state['values']['details']['finished']) {
    $submission = webform_get_submission($node->webform['nid'], $sid, TRUE);
    webform_submission_send_mail($node, $submission);
  }

  // Strip out empty tags added by WYSIWYG editors if needed.
  $confirmation = strlen(trim(strip_tags($node->webform['confirmation']))) ? $node->webform['confirmation'] : '';

  // Clean up the redirect URL and filter it for webform tokens.
  $redirect_url = trim($node->webform['redirect_url']);
  $redirect_url = _webform_filter_values($redirect_url, $node, $submission, NULL, FALSE, TRUE);


  // Remove the domain name from the redirect.
  $redirect_url = preg_replace('/^' . preg_quote($GLOBALS['base_url'], '/') . '\//', '', $redirect_url);

  // Check confirmation and redirect_url fields.
  $message = NULL;
  $redirect = NULL;
  $external_url = FALSE;
  if (isset($form['actions']['draft']['#value']) && $form_state['values']['op'] == $form['actions']['draft']['#value']) {
    $message = t('Submission saved. You may return to this form later and it will restore the current values.');
  }
  elseif ($is_draft) {
    $redirect = NULL;
  }
  elseif (!empty($form_state['values']['details']['finished'])) {
    $message = t('Submission updated.');
  }
  elseif ($redirect_url == '<none>') {
    $redirect = NULL;
  }
  elseif ($redirect_url == '<confirmation>') {
    $redirect = array('node/' . $node->nid . '/done', array('query' => array('sid' => $sid)));
  }
  elseif (valid_url($redirect_url, TRUE)) {
    $redirect = $redirect_url;
    $external_url = TRUE;
  }
  elseif ($redirect_url && strpos($redirect_url, 'http') !== 0) {
    $parts = drupal_parse_url($redirect_url);
    $parts['query'] ? ($parts['query']['sid'] = $sid) : ($parts['query'] = array('sid' => $sid));
    $query = $parts['query'];
    $redirect = array($parts['path'], array('query' => $query, 'fragment' => $parts['fragment']));
  }

  // Show a message if manually set.
  if (isset($message)) {
    drupal_set_message($message);
  }
  // If redirecting and we have a confirmation message, show it as a message.
  elseif (!$is_draft && !$external_url && (!empty($redirect_url) && $redirect_url != '<confirmation>') && !empty($confirmation)) {
    drupal_set_message(check_markup($confirmation, $node->webform['confirmation_format'], '', TRUE));
  }
  $form_state['redirect'] = $redirect;    
}

function custom_form_search_form_alter(&$form, &$form_state, $form_id){
  if ($form_id == 'search_form'){
      //hide advanced search form
      hide($form);
  }
}

/*
function custom_form_uc_form_alter(&$form, &$form_state, $form_id) {
  if (strpos($form_id, 'add_to_cart_form') || $form_id == 'uc_order_add_product_form') {
    $use_ajax = strpos($form_id, 'add_to_cart_form') && variable_get('uc_product_update_node_view', FALSE);
    $node =& $form['node']['#value'];
    $id = $form_id . '-' . $node->nid . '-attributes';
    // If the node has a product list, add attributes to them.
    if (isset($form['products']) || isset($form['sub_products'])) {
      if (isset($form['products'])) {
        $element = &$form['products'];
      }
      else {
        $element = &$form['sub_products'];
      }
      foreach (element_children($element) as $key) {
        $element[$key]['attributes'] = _uc_attribute_alter_form($id . '-' . $key, $node->products[$key], $use_ajax);

        if (is_array($element[$key]['attributes'])) {
          $element[$key]['attributes']['#tree'] = TRUE;
          $element[$key]['#type'] = 'fieldset';
        }
      }
    }
    // If not, add attributes to the node.
    else {
      $form['attributes'] = _uc_attribute_alter_form($id, $node, $use_ajax);

      if (is_array($form['attributes'])) {
        $form['attributes']['#tree'] = TRUE;
        $form['attributes']['#weight'] = -1;
      }
    }
  }
}
*/


