<?php 

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With'); ?>

<?php require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'library/PHPWine/PHPWine.php'; ?>
<?php 

 use \PHPWine\VanillaFlavour\Plugins\PHPCrud\Crud\Vanilla; $phpCrud = new Vanilla;

 // Request vanilla public connection 
 $wine_db = $phpCrud->wine_db();

 // Validate database then Make wine 
 if( $wine_db === false ) { die("ERROR: Could not connect. " . $wine_db->connect_error); } 

 $api_make = new class extends Vanilla {
    
  /**
   * @var 
   * @property Initialized
   * Defined request new data input through api
   * @since 03.15.2022
   **/
   private $request;
  
   // processing new data 
   public function __construct()
   {
      
      // Run operation !
      function make_api(  $make_api  ) {

       if( $make_api ) {

         /**
          * Incase reponsed code is 200 means okay!
          **/
         http_response_code(200);  
         // execute do process insert data into database response message output
         echo json_encode(
             array('message' => 'Post Created')
           );
     
         } else if( http_response_code(503) ) {
         // execute api error message to the browser  
            echo json_encode(
             array('message' => 'Post Not Created')
           );
       
        } else {    
      
         /**
          * Incase all fields are required and some are empty !
          **/
          http_response_code(400);    
         // execute api error message to the browser  
          echo json_encode(array("message" => "Unable to create a post some field are empty "));
      } 
 
      return false;
 
   }

   $this->decode();
   $this->vanilla_make(Vanilla::MAKE);
      
   }

   // do make new request data through api
   private function decode() : void
   {
       $this->request = json_decode(file_get_contents("php://input"));
   }
   
   // do make new data through api
   private function vanilla_make( string $vanilla) : void
   {
         new Vanilla( $vanilla, 'friends', [ 
    
         'name'               => htmlspecialchars( strip_tags( trim( $this->request->name ))),
         'email'              => htmlspecialchars( strip_tags( trim( $this->request->email ))),
         'relationship'       => htmlspecialchars( strip_tags( trim( $this->request->relationship ))),
         'friend_category_id' => htmlspecialchars( strip_tags( trim( $this->request->friend_category_id )))
     
      ], 'make_api' );
     
   }

 };
 
 // closed database create data
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
