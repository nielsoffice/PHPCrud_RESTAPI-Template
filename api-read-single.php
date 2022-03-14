<?php 

 header('Access-Control-Allow-Origin: *');
 header('Content-Type: application/json');  ?>

<?php require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'library/PHPWine/PHPWine.php'; ?>
<?php 
 
 $phpCrud = new \PHPWine\VanillaFlavour\Plugins\PHPCrud\Crud\Vanilla;

 // Request vanilla public connection 
 $wine_db   = $phpCrud->wine_db();

 if( $wine_db === false ) { die("ERROR: Could not connect. " . $wine_db->connect_error); }

 // Incase everything is fine means response is 200 api then run operation 
 // read the data call back function (operation) 
 function api_post_get($api_posts_get)
 {

  $post = array(); if( $api_posts_get )   {

    foreach ($api_posts_get as $value) {

         $posts_model = array(

          'friend_id'          => $value['friend_id'],
          'name'               => $value['name'],
          'email'              => $value['email'],
          'relationship'       => $value['relationship'],
          'friend_category_id' => $value['friend_category_id'],
          'relastionship_name' => $value['relastionship_name']

          );

          array_push($post, $posts_model);

        }

        /**
         * Incase reponsed code is 200 means okay!
         * **/
        http_response_code(200); 
        // execute api read single data to the browser 
        echo json_encode($post);

      } else {

        /**
         * Incase reponsed code is 404 or greater means no found data !
         * **/
        http_response_code(404); 
        // execute api error message to the browser   
        echo json_encode(
          array('message' => 'No Posts Found')
        );

      }
      
 }
 
 // Fetch query into api
 $api_post_get = $phpCrud->wine_fetch('', [

  'mixed' => ["
      
      SELECT   fc.name as relastionship_name, 
                    
                    friend.friend_id, 
                    friend.friend_category_id, 
                    friend.name, 
                    friend.email, 
                    friend.relationship, 
                    friend.created_at

      FROM       friends friend
      LEFT JOIN  friend_categories fc ON friend.friend_category_id = fc.cat_id
      WHERE      friend.friend_id = {$_REQUEST['friend_id']}
      LIMIT      0,1

  "]

  ], 'api_post_get' );   

 // Closed public connection
 $wine_db->close();


