<?php
/**
 * @file
 * Contains the theme's functions to manipulate Drupal's default markup.
 *
 * A QUICK OVERVIEW OF DRUPAL THEMING
 *
 *   The default HTML for all of Drupal's markup is specified by its modules.
 *   For example, the comment.module provides the default HTML markup and CSS
 *   styling that is wrapped around each comment. Fortunately, each piece of
 *   markup can optionally be overridden by the theme.
 *
 *   Drupal deals with each chunk of content using a "theme hook". The raw
 *   content is placed in PHP variables and passed through the theme hook, which
 *   can either be a template file (which you should already be familiary with)
 *   or a theme function. For example, the "comment" theme hook is implemented
 *   with a comment.tpl.php template file, but the "breadcrumb" theme hooks is
 *   implemented with a theme_breadcrumb() theme function. Regardless if the
 *   theme hook uses a template file or theme function, the template or function
 *   does the same kind of work; it takes the PHP variables passed to it and
 *   wraps the raw content with the desired HTML markup.
 *
 *   Most theme hooks are implemented with template files. Theme hooks that use
 *   theme functions do so for performance reasons - theme_field() is faster
 *   than a field.tpl.php - or for legacy reasons - theme_breadcrumb() has "been
 *   that way forever."
 *
 *   The variables used by theme functions or template files come from a handful
 *   of sources:
 *   - the contents of other theme hooks that have already been rendered into
 *     HTML. For example, the HTML from theme_breadcrumb() is put into the
 *     $breadcrumb variable of the page.tpl.php template file.
 *   - raw data provided directly by a module (often pulled from a database)
 *   - a "render element" provided directly by a module. A render element is a
 *     nested PHP array which contains both content and meta data with hints on
 *     how the content should be rendered. If a variable in a template file is a
 *     render element, it needs to be rendered with the render() function and
 *     then printed using:
 *       <?php print render($variable); ?>
 *
 * ABOUT THE TEMPLATE.PHP FILE
 *
 *   The template.php file is one of the most useful files when creating or
 *   modifying Drupal themes. With this file you can do three things:
 *   - Modify any theme hooks variables or add your own variables, using
 *     preprocess or process functions.
 *   - Override any theme function. That is, replace a module's default theme
 *     function with one you write.
 *   - Call hook_*_alter() functions which allow you to alter various parts of
 *     Drupal's internals, including the render elements in forms. The most
 *     useful of which include hook_form_alter(), hook_form_FORM_ID_alter(),
 *     and hook_page_alter(). See api.drupal.org for more information about
 *     _alter functions.
 *
 * OVERRIDING THEME FUNCTIONS
 *
 *   If a theme hook uses a theme function, Drupal will use the default theme
 *   function unless your theme overrides it. To override a theme function, you
 *   have to first find the theme function that generates the output. (The
 *   api.drupal.org website is a good place to find which file contains which
 *   function.) Then you can copy the original function in its entirety and
 *   paste it in this template.php file, changing the prefix from theme_ to
 *   STARTERKIT_. For example:
 *
 *     original, found in modules/field/field.module: theme_field()
 *     theme override, found in template.php: STARTERKIT_field()
 *
 *   where STARTERKIT is the name of your sub-theme. For example, the
 *   zen_classic theme would define a zen_classic_field() function.
 *
 *   Note that base themes can also override theme functions. And those
 *   overrides will be used by sub-themes unless the sub-theme chooses to
 *   override again.
 *
 *   Zen core only overrides one theme function. If you wish to override it, you
 *   should first look at how Zen core implements this function:
 *     theme_breadcrumbs()      in zen/template.php
 *
 *   For more information, please visit the Theme Developer's Guide on
 *   Drupal.org: http://drupal.org/node/173880
 *
 * CREATE OR MODIFY VARIABLES FOR YOUR THEME
 *
 *   Each tpl.php template file has several variables which hold various pieces
 *   of content. You can modify those variables (or add new ones) before they
 *   are used in the template files by using preprocess functions.
 *
 *   This makes THEME_preprocess_HOOK() functions the most powerful functions
 *   available to themers.
 *
 *   It works by having one preprocess function for each template file or its
 *   derivatives (called theme hook suggestions). For example:
 *     THEME_preprocess_page    alters the variables for page.tpl.php
 *     THEME_preprocess_node    alters the variables for node.tpl.php or
 *                              for node--forum.tpl.php
 *     THEME_preprocess_comment alters the variables for comment.tpl.php
 *     THEME_preprocess_block   alters the variables for block.tpl.php
 *
 *   For more information on preprocess functions and theme hook suggestions,
 *   please visit the Theme Developer's Guide on Drupal.org:
 *   http://drupal.org/node/223440 and http://drupal.org/node/1089656
 */


/**
 * Override or insert variables into the maintenance page template.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("maintenance_page" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_maintenance_page(&$variables, $hook) {
  // When a variable is manipulated or added in preprocess_html or
  // preprocess_page, that same work is probably needed for the maintenance page
  // as well, so we can just re-use those functions to do that work here.
  STARTERKIT_preprocess_html($variables, $hook);
  STARTERKIT_preprocess_page($variables, $hook);
}
// */

/**
 * Override or insert vtaxonomy_image_display()ariables into the html templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("html" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_html(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');

  // The body tag's classes are controlled by the $classes_array variable. To
  // remove a class from $classes_array, use array_diff().
  //$variables['classes_array'] = array_diff($variables['classes_array'], array('class-to-remove'));
}
// */

/**
 * Override or insert variables into the page templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_page(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the node templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_node(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');

  // Optionally, run node-type-specific preprocess functions, like
  // STARTERKIT_preprocess_node_page() or STARTERKIT_preprocess_node_story().
  $function = __FUNCTION__ . '_' . $variables['node']->type;
  if (function_exists($function)) {
    $function($variables, $hook);
  }
}
// */

/**
 * Override or insert variables into the comment templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_comment(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the region templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("region" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_region(&$variables, $hook) {
  // Don't use Zen's region--sidebar.tpl.php template for sidebars.
  //if (strpos($variables['region'], 'sidebar_') === 0) {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('region__sidebar'));
  //}
}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_block(&$variables, $hook) {
  // Add a count to all the blocks in the region.
  // $variables['classes_array'][] = 'count-' . $variables['block_id'];

  // By default, Zen will use the block--no-wrapper.tpl.php for the main
  // content. This optional bit of code undoes that:
  //if ($variables['block_html_id'] == 'block-system-main') {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('block__no_wrapper'));
  //}
}
// */

/**
 * Implement preprocess_html()
 * 
 * @param type $variables
 */
drupal_add_library('system', 'effects.highlight'); // add jQuery UI effect

function nickandersonart_preprocess_html(&$variables) {
  drupal_add_css('http://fonts.googleapis.com/css?family=Josefin+Sans:400,700', array('type' => 'external'));
  drupal_add_css('http://fonts.googleapis.com/css?family=PT+Sans:400,700', array('type' => 'external'));
}

/**
 * Implements hook_cart_block_preprocess()
 * This function hide top cart block
 * @global type $user
 * @return type
 */
function nickandersonart_uc_cart_block_content() {
    
    $output = "";
    $total = "";
    $item_text = "";
    
    global $user; 

      $items = uc_cart_get_contents();
      $item_count = 0;
        if (!empty($items)) {
          foreach ($items as $item) {
            if (isset($item->data['attributes'])){  
                if (is_array($item->data['attributes']) && !empty($item->data['attributes'])) {
                  $display_item = module_invoke($item->module, 'cart_display', $item);
                  $output .= '<tr><td colspan="3">' . $display_item['options']['#value'] . '</td></tr>';
                }
            }
            $total += ($item->price) * $item->qty;
            $item_count += $item->qty;
          }
              }
          //if ($item_count > 0) {    
                if (variable_get('uc_checkout_enabled', TRUE)) {
                  $output .= l(t('MY CART (' . $item_count . ')'), 'cart/checkout', array('rel' => 'nofollow'));
                }
          //}      
        return $output;
}

function nickandersonart_preprocess_search_result(&$variables) {
global $language;

  $result = $variables['result'];

 // Add image to product search result 
 if ($result['node']->type == "product") {
     $node = node_load($result['node']->nid);
     $prod_image = field_view_field('node', $node, 'uc_product_image', $display = array());
     $variables['image'] = $prod_image;
 }
 
  $variables['url'] = check_url($result['link']);
  $variables['title'] = check_plain($result['title']);
  if (isset($result['language']) && $result['language'] != $language->language && $result['language'] != LANGUAGE_NONE) {
    $variables['title_attributes_array']['xml:lang'] = $result['language'];
    $variables['content_attributes_array']['xml:lang'] = $result['language'];
  }

  $info = array();
  if (!empty($result['module'])) {
    $info['module'] = check_plain($result['module']);
  }
  if (!empty($result['user'])) {
    $info['user'] = $result['user'];
  }
  if (!empty($result['date'])) {
    $info['date'] = format_date($result['date'], 'short');
  }
  if (isset($result['extra']) && is_array($result['extra'])) {
    $info = array_merge($info, $result['extra']);
  }
  // Check for existence. User search does not include snippets.
  $variables['snippet'] = isset($result['snippet']) ? $result['snippet'] : '';
  // Provide separated and grouped meta information..
  $variables['info_split'] = $info;
  $variables['info'] = implode(' - ', $info);
  $variables['theme_hook_suggestions'][] = 'search_result__' . $variables['module'];
}

/**
 * Returns HTML for a query pager.
 *
 * Menu callbacks that display paged query results should call theme('pager') to
 * retrieve a pager control so that users can view other results. Format a list
 * of nearby pages with additional query results.
 *
 * @param $variables
 *   An associative array containing:
 *   - tags: An array of labels for the controls in the pager.
 *   - element: An optional integer to distinguish between multiple pagers on
 *     one page.
 *   - parameters: An associative array of query string parameters to append to
 *     the pager links.
 *   - quantity: The number of pages in the list.
 *
 * @ingroup themeable
 */      
function nickandersonart_pager($variables) {
  $tags = $variables['tags'];
  $element = $variables['element'];
  $parameters = $variables['parameters'];
  $quantity = $variables['quantity'];
  global $pager_page_array, $pager_total;

  // Calculate various markers within this pager piece:
  // Middle is used to "center" pages around the current page.
  $pager_middle = ceil($quantity / 2);
  // current is the page we are currently paged to
  $pager_current = $pager_page_array[$element] + 1;
  // first is the first page listed by this pager piece (re quantity)
  $pager_first = $pager_current - $pager_middle + 1;
  // last is the last page listed by this pager piece (re quantity)
  $pager_last = $pager_current + $quantity - $pager_middle;
  // max is the maximum page number
  $pager_max = $pager_total[$element];
  // End of marker calculations.

  // Prepare for generation loop.
  $i = $pager_first;
  if ($pager_last > $pager_max) {
    // Adjust "center" if at end of query.
    $i = $i + ($pager_max - $pager_last);
    $pager_last = $pager_max;
  }
  if ($i <= 0) {
    // Adjust "center" if at start of query.
    $pager_last = $pager_last + (1 - $i);
    $i = 1;
  }
  // End of generation loop preparation.

  $li_first = theme('pager_first', array('text' => (isset($tags[0]) ? $tags[0] : t('« first')), 'element' => $element, 'parameters' => $parameters));
  $li_previous = theme('pager_previous', array('text' => (isset($tags[1]) ? $tags[1] : t('‹ previous')), 'element' => $element, 'interval' => 1, 'parameters' => $parameters));
  $li_previous_gray = theme('pager_previous', array('text' => (isset($tags[1]) ? $tags[1] : t('‹ previous')), 'element' => $element, 'interval' => 1, 'parameters' => $parameters));
  $li_next = theme('pager_next', array('text' => (isset($tags[3]) ? $tags[3] : t('next ›')), 'element' => $element, 'interval' => 1, 'parameters' => $parameters));
  $li_last = theme('pager_last', array('text' => (isset($tags[4]) ? $tags[4] : t('last »')), 'element' => $element, 'parameters' => $parameters));

  if ($pager_total[$element] > 1) {
      
    // When there is more than one page, create the pager list.
    if ($i != $pager_max) {
      if ($i > 1) {
        $items[] = array(
          'class' => array('pager-ellipsis'),
          'data' => '…',
        );
      }
      // Now generate the actual pager piece.
      for (; $i <= $pager_last && $i <= $pager_max; $i++) {
        if ($i < $pager_current) {
          $items[] = array(
            'class' => array('pager-item'),
            'data' => theme('pager_previous', array('text' => $i, 'element' => $element, 'interval' => ($pager_current - $i), 'parameters' => $parameters)),
          );
        }
        if ($i == $pager_current) {
          $items[] = array(
            'class' => array('pager-current'),
            'data' => $i,
          );
        }
        if ($i > $pager_current) {
          $items[] = array(
            'class' => array('pager-item'),
            'data' => theme('pager_next', array('text' => $i, 'element' => $element, 'interval' => ($i - $pager_current), 'parameters' => $parameters)),
          );
        }
      }
      if ($i < $pager_max) {
        $items[] = array(
          'class' => array('pager-ellipsis'),
          'data' => '…',
        );
      }
    }
    // End generation.
   // $items[] = array(
     //   'data' => '<br/>',
    //);
   
    if ($pager_current == 1) {
                $items[] = array(
                    'class' => array('pager-previous-gray'),
                    'data' => '',
                );
            
        } else {
            if ($li_previous) {
                $items[] = array(
                    'class' => array('pager-previous'),
                    'data' => $li_previous,
                );
            }
        }
    if ($pager_current == $pager_max) {
        $items[] = array(
                    'class' => array('pager-next-gray'),
                    'data' => '',
                );
    }    
    if ($li_next) {
      $items[] = array(
        'class' => array('pager-next'),
        'data' => $li_next,
      );
    }
    
    return '<h2 class="element-invisible">' . t('Pages') . '</h2>' . theme('item_list', array(
      'items' => $items,
      'attributes' => array('class' => array('pager')),
    ));
  }

}


/**
 * Themes a taxonomy-based exposed filter select element as a nested unordered list.  Note: this
 * routine depends on the '-' char prefixed on the term names by Views to determine depth.
 *
 * @param array $vars - An array of arrays, the 'element' item holds the properties of the element.
 * @return HTML
 */
function nickandersonart_select_as_tree($vars) {
  $element = $vars['element'];
 // krumo($element); die();
  // The selected keys from #options
  $selected_options = empty($element['#value']) ? $element['#default_value'] : $element['#value'];

  /*
   *  Build a bunch of nested unordered lists to represent the hierarchy based on the '-' prefix
   *  added by Views or optgroup structure.
   */
  $output = '<ul class="bef-tree">';
  $curr_depth = 0;
  foreach ($element['#options'] as $option_value => $option_label) {
      
    // Check for Taxonomy-based filters
    if (is_object($option_label)) {
      $slice = array_slice($option_label->option, 0, 1, TRUE);
      list($option_value, $option_label) = each($slice);
    }

    // Check for optgroups -- which is basically a two-level deep tree
    if (is_array($option_label)) {
      // TODO:
    }
    else {
      // Build hierarchy based on prefixed '-' on the element label
      if (t('- Any -') == $option_label) {
        $depth = 0;
      }
      else {
        preg_match('/^(-*).*$/', $option_label, $matches);
        $depth = strlen($matches[1]);
        $option_label = ltrim($option_label, '-');
      }

      // Build either checkboxes or radio buttons, depending on Views' settings
      $html = '';
      if (!empty($element['#multiple'])) {
        $html = bef_checkbox(
          $element,
          $option_value,
          $option_label,
          (array_search($option_value, $selected_options) !== FALSE)
        );
      }
      else {
        $element[$option_value]['#title'] = $option_label;
        $element[$option_value]['#children'] = theme('radio', array('element' => $element[$option_value]));
        $html .= theme('form_element', array('element' => $element[$option_value]));
      }
      
      /**
       * load nodes... if empty - just show empty html.
       * when we add to product some taxonomy term - this term will be available in our filter
       */
      foreach ($slice as $value => $id) {
          $nodes = taxonomy_select_nodes($value);
          if (empty($nodes)) {
              $html = '';
          }

      }
      
      if ($depth > $curr_depth) {
        // We've moved down a level: create a new nested <ul>
        // TODO: Is there is a way to jump more than one level deeper at a time?  I don't think so...
        
        $output .= "<ul class='bef-tree-child bef-tree-depth-$depth'><li>$html";
        
        $curr_depth = $depth;
      }
      elseif ($depth < $curr_depth) {
        // We've moved up a level: finish previous <ul> and <li> tags, once for each level, since we
        // can jump multiple levels up at a time.
        while ($depth < $curr_depth) {
          $output .= '</li></ul>';
          $curr_depth--;
        }
        $output .= "</li><li>$html";
      }
      else {
        // Remain at same level as previous entry. No </li> needed if we're at the top level
        if (0 == $curr_depth) {
          $output .= "<li>$html";
        }
        else {
          $output .= "</li><li>$html";
        }
      }
    }
  }                             // foreach ($element['#options'] as $option_value => $option_label)

  if (!$curr_depth) {
    // Close last <li> tag
    $output .= '</li>';
  }
  else {
    // Finish closing <ul> and <li> tags
    while ($curr_depth) {
      $curr_depth--;
      $output .= '</li></ul></li>';
    }
  }

  // Close the opening <ul class="bef-tree"> tag
  $output .= '</ul>';

  // Add exposed filter description
  $description = '';
  if (!empty($element['#bef_description'])) {
    $description = '<div class="description">'. $element['#bef_description'] .'</div>';
  }

  // Add the select all/none option, if needed
  if (!empty($element['#bef_select_all_none'])) {
    if (empty($element['#attributes']['class'])) {
      $element['#attributes']['class'] = array();
    }
    $element['#attributes']['class'][] = 'bef-select-all-none';
  }

  return '<div' . drupal_attributes($element['#attributes']) . ">$description$output</div>";
}

/**
 * Alter specific exposed forms to change the textfield into a select item
 * @param $vars
 * @param $hook
 * @see http://drupal.org/node/320992
 * @seealso http://drupalsn.com/learn-drupal/drupal-questions/question-7534
 */
/*
function nickandersonart_preprocess_views_exposed_form(&$vars, $hook) {
    //filter behavior for specified forms, by id
    $allowed_forms = array(
        'views-exposed-form-products-page',
    );
 
    // filter
    if ( in_array($vars['form']['#id'], $allowed_forms) ) {
        // which form field to override
        $filter = 'new';
 
        $vars['form'][$filter]['#type'] = 'submit'; //change type
        //$vars['form'][$filter]['#size'] = '1'; //update size to be a dropdown?
        $vars['form'][$filter]['#markup'] = '<input '. drupal_attributes(array('type' => 'button', 'value' => t('Reset') )) .'onclick="javascript:$(this.form).clearForm();$(this.form).submit();" class="form-submit" />';
 
        //tricks the Views into rerendering the filter
        unset($vars['form'][$filter]['#printed']);
        $vars['widgets']['filter-'.$filter]->widget = drupal_render($vars['form'][$filter]);
    }
}*/