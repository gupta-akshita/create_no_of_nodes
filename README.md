#A form which create the requested number of nodes in the system.

  *Introduction <br />
  *Requirements
  *Installation
  *Configuration
  *Resources Used
  

INTRODUCTION
----------------------

A form with following 4 fields : 
  1. Number of Nodes (Integer)
  2. Content Type (Dropdown of all content type in website)
  3. Title
  4. Body.


REQUIRMENTS
----------------------

#Create the requested number of nodes in the system. If user enters number greater than 5, show an error on screen.


INSTALLATION
----------------------

1. Install as you would  normally install a Druapl contributed module. 
* Visit: https://www.drupal.org/docs/8/extending-drupal-8/installing-drupal-8-modules
for further informtaion.


CONFIGURATION
----------------------

1. Go to localhost/{drupal-site-name}/details

2. Fill the form: 
     a) No. of Nodes
     b) Select the content Type
     c) Write title
     d) Write description in body
     
3. Click on "Submit"

4. Go to Administrator > Content to check your created nodes


RESOURCES USED
----------------------

https://api.drupal.org/api/drupal/core%21lib%21Drupal%21Core%21Form%21form.api.php/function/hook_form_FORM_ID_alter/8.2.x
https://www.drupal.org/node/2407153
https://api.drupal.org/api/drupal/core!includes!bootstrap.inc/function/drupal_set_message/8.2.x
https://www.drupal.org/docs/8/api/routing-system/structure-of-routes
https://www.drupal.org/docs/8/api/routing-system/using-parameters-in-routes
https://api.drupal.org/api/drupal/vendor%21symfony%21http-foundation%21JsonResponse.php/class/JsonResponse/8.2.x
