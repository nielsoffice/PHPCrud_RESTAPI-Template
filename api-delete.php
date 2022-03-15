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

  // Validate database then remove single data wine 
  if( $wine_db === false ) { die("ERROR: Could not connect. " . $wine_db->connect_error); }

 $api_Delete = new Class extends Vanilla {

   /**
    * @var 
    * @property Initialized
    * Defined request new data input update through api
    * @since 03.15.2022
    **/
   private $request;
  
   public function __construct()
   {

      function delete_api( $delete_api ) {
  
         if( $delete_api ) {
           
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
     
      }

      $this->decode();
      $this->vanilla_delete(Vanilla::DELETE);
      
   }

   // do make new request data through api
   private function decode() : void
   {
      $this->request = json_decode(file_get_contents("php://input"));
   }
  
   // select data and delete via id through api
   private function vanilla_delete( string $vanilla ) : void
   {

      new Vanilla( $vanilla , '', [ 
    
         'friends',
         'condition' => [" WHERE friend_id = {$this->request->friend_id} "]
     
      ], 'delete_api' );
     
   }

  };
 
// closed database delete selected by id api data 
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

