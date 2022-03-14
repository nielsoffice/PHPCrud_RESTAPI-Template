<?php 

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With'); ?>

<?php require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'library/PHPWine/PHPWine.php'; ?>
<?php 

 use \PHPWine\VanillaFlavour\Plugins\PHPCrud\Crud\Vanilla;

 $phpCrud    = new Vanilla();

 // Request vanilla public connection 
 $wine_db = $phpCrud->wine_db();

 if( $wine_db === false ) { die("ERROR: Could not connect. " . $wine_db->connect_error); }
 
 $data = json_decode(file_get_contents("php://input"));

 function make_api( $make_api ) {
  
    if( $make_api ) {

        /**
         * Incase reponsed code is 200 means okay!
         * **/
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
         * **/
         http_response_code(400);    
        // execute api error message to the browser  
         echo json_encode(array("message" => "Unable to create a post some field are empty "));
     } 

 }

 $make_api    = new Vanilla(Vanilla::MAKE, 'friends', [ 
    
    'name'               => htmlspecialchars( strip_tags( trim( $data->name ))),
    'email'              => htmlspecialchars( strip_tags( trim( $data->email ))),
    'relationship'       => htmlspecialchars( strip_tags( trim( $data->relationship ))),
    'friend_category_id' => htmlspecialchars( strip_tags( trim( $data->friend_category_id )))

 ], 'make_api' );

 // closed public connection
 $wine_db->close();
