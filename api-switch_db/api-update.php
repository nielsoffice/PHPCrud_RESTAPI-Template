<?php 

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With'); 

 $api_Update = new Class {

  /**
   * @var 
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

    $this->vanilla_update( new mysqli('localhost','root','','multiserver') );

  }

   // do make new request data through api
   private function decode() : void
   {
       $this->request = json_decode(file_get_contents("php://input"));
   }
   
   // do update selected data through api
   private function vanilla_update( MySQLi $api_wine_multi_server ) : void
   {
     
      $this->init->api_wine_multi_server( $api_wine_multi_server, [ 'api_wine_put' => function() {
                     
        $name  = htmlspecialchars( strip_tags( trim( $this->request->name ))); 
        $email = htmlspecialchars( strip_tags( trim( $this->request->email )));
        $relationship       = htmlspecialchars( strip_tags( trim( $this->request->relationship )));
        $friend_category_id = htmlspecialchars( strip_tags( trim( $this->request->friend_category_id )));
        $friend_id          = htmlspecialchars( strip_tags( trim( $this->request->friend_id )));

        return [

           'debug' => false, 
           'query' => [ 'mixed' => [ 
       
              " UPDATE friends 
                SET  
                
                    `name`               = '".$name."' , 
                    `email`              = '".$email."' ,
                    `relationship`       = '".$relationship."' , 
                    `friend_category_id` = '".$friend_category_id."' 
                  
                WHERE friend_id =  '".$friend_id."' ;

              "]],
              
        ];

     }], function( $update_api ) {  if( $update_api ) {
    
            /**
             * Incase reponsed code is 200 means okay!
             **/
            http_response_code(200);  
            // execute do process insert data into database response message output
            echo json_encode(
                array('message' => 'Post Updated')
              );
        
            } else if( http_response_code(503) ) {
            // execute api error message to the browser  
               echo json_encode(
                array('message' => 'Post Not update')
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
    
     } );

     // closed database connection read
     $this->init->wine_db()->close();
     
   }

   private function php_wine(string $autoload) : void {

    require dirname(__FILE__) . DIRECTORY_SEPARATOR .'../vendor/' . $autoload.'.'.'php';

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

