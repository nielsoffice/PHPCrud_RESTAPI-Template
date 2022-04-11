<?php 

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With'); 

 $api_Delete = new Class {

   /**
    * @property Initialized
    * Defined request new data input update through api
    * @since 03.15.2022
    **/
   private $request;
   private $init;
  
   public function __construct()
   {
  
      $this->php_wine('autoload');

      $this->init = new PHPWineVanillaFlavour\Plugins\PHPCrud\Crud\Vanilla;
   
      $this->decode();

      $this->vanilla_delete($this->init::DELETE);
      
   }

   // do make new request data through api
   private function decode() : void
   {
      $this->request = json_decode(file_get_contents("php://input"));
   }
  
   // select data and delete via id through api
   private function vanilla_delete( string $vanilla ) : void
   {

     // Request vanilla public connection 
     $this->init->wine_db();

     // Validate database then Read wine 
     if( $this->init === false ) { die("ERROR: Could not connect. " . $this->init->connect_error); }

      new PHPWineVanillaFlavour\Plugins\PHPCrud\Crud\Vanilla( $vanilla , '', [ 
    
         'friends',
         'condition' => [" WHERE friend_id = {$this->request->friend_id} "]
     
      ], function ( $delete_api ) { if( $delete_api ) {
           
             /**
              * Incase reponsed code is 200 means okay!
             **/
             http_response_code(200);  
             // execute do process delete data into database response message output
             echo json_encode(
                 array('message' => 'Post Deleted')
               );
         
             } else {
         
              /**
               * Incase reponsed code is 404 or greater means no found data !
              **/
              http_response_code(404); 
              // execute api error message to the browser  
              echo json_encode(
                 array('message' => 'Post Not Deleted')
                );
           
          } 
     
      });
   
     // closed database connection read
     $this->init->wine_db()->close();
     
   }

   private function php_wine(string $autoload) : void {

      require dirname(__FILE__) . DIRECTORY_SEPARATOR .'vendor/' . $autoload.'.'.'php';
  
     }

  };

 /**
  * 
  * Would you like me to treat a cake and coffee ?
  * Become a donor, Because with you! We can build more...
  * Donate:
  * GCash : +639650332900
  * Paypal account: syncdevprojects@gmail.com
  * 
 **/ 

