<?php

 header('Access-Control-Allow-Origin: *');
 header('Content-Type: application/json');  ?>

<?php require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'library/PHPWine/PHPWine.php'; ?>
<?php 
 
 use PHPWine\VanillaFlavour\Plugins\PHPCrud\Crud\Vanilla; $phpCrud = new Vanilla;

 // Request vanilla public connection 
 $wine_db = $phpCrud->wine_db();

 // Validate database then Read Single wine 
 if( $wine_db === false ) { die("ERROR: Could not connect. " . $wine_db->connect_error); }

 $api_readSingle = new Class extends Vanilla {
   
  /**
   * @var 
   * @property Initialized
   * Defined read data from api
   * @since 03.15.2022
   **/
  private $init;

  public function __construct()
  {

  // Incase everything is fine means response is 200 api then run operation 
  // read the data call back function (operation) 
  function api_posts_get($api_posts_get) {

   $post = array(); if( $api_posts_get ) {

     foreach ($api_posts_get as $friend) {

          $posts_model = array(

            'friend_id'          => $friend['friend_id'],
            'name'               => $friend['name'],
            'email'              => $friend['email'],
            'relationship'       => $friend['relationship'],
            'friend_category_id' => $friend['friend_category_id'],
            'relastionship_name' => $friend['relastionship_name']

          );

          array_push($post, $posts_model);

        }
        
        /**
         * Incase reponsed code is 200 means okay!
         **/
        http_response_code(200); 
        // execute api read to the browser 
        echo json_encode($post);

      } else {
        
        /**
         * Incase reponsed code is 404 or greater means no found data !
         **/
        http_response_code(404); 
        // execute api error message to the browser    
        echo json_encode(
          array('message' => 'Have no post available')
        );
      }

      return [];

   }

   $this->vanilla_readSingle(Vanilla::FETCH);
    
  }
 
  // Request join query statements
  private function join_query() : string {

   return "SELECT fc.name as relastionship_name, 
                         
             friend.friend_id, 
             friend.friend_category_id, 
             friend.name, 
             friend.email, 
             friend.relationship, 
             friend.created_at

           FROM       friends friend
           LEFT JOIN  friend_categories fc 
           ON         friend.friend_category_id = fc.cat_id
           WHERE      friend.friend_id = {$_REQUEST['friend_id']}
           LIMIT      0,1
         ";

  }

   // get all data through api
   private function vanilla_readSingle( string $vanilla) : void {
      
     $this->init = new Vanilla( $vanilla , '', [ 'mixed' => [ $this->join_query() ] ], 'api_posts_get' );   
     
   }

 };

 // closed database connection single readt data 
 $wine_db->close();

 /**
  * 
  * Would you like me to treat a cake and coffee ?
  * Become a donor, Because with you! We can build more...
  * Donate:
  * GCash : +639650332900
  * Paypal account: syncdevprojects@gmail.com
  * 
 **/ 
