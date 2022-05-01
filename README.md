# PHPCrud_RESTAPI-Template
Rest-api using PHPCrud snippet 

```PHP
// Create Basic Authentication 
if( !isset($_SERVER['PHP_AUTH_USER'] ) ) :
   
    header("WWW-Authenticate: Basic realm=\"Private Data\"");
    header("HTTP/1.0 401 Unauthorized");
    print("Credential required | [ username : password ] ");

else :

     if( ($_SERVER['PHP_AUTH_USER'] == 'niel' && ($_SERVER['PHP_AUTH_PW'] == 'admin')) ) { 

        // api class goes here
        print("Welcome to data!");

    } else {
        
        // forbid accessing api !
        header("HTTP/1.0 401 Unauthorized");
        return ;
    }

endif;

```
```PHP
 // Header: 
 Key: Content-Type  
 Value: application/json
 ```
 ```SQL
 # Create database and run these via command SQL

 CREATE TABLE `friend_categories` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cat_id`)
 );

 INSERT INTO `friend_categories` (`cat_id`, `name`) VALUES
 (1,'School'),
 (2,'Church'),
 (3,'Work'),

 CREATE TABLE `friends` (
  `friend_id` int(11) NOT NULL AUTO_INCREMENT,
  `friend_category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `relationship` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`friend_id`)
 );

 INSERT INTO `friends` (`friend_id`, `friend_category_id`, `name`, `email`, `relationship`) VALUES
 (1, 1, 'Nikkie The Drummer', 'nikkiTheDrumer@mail.com','School'),
 (2, 2, 'Japz The Pastor ', 'japzThePastor@mail.com','Church'),
 (3, 3, 'Niel Music Director', 'nielMusicDirector@mail.com','Work'),
```

```PHP
  
   // v1.3 Pre-released
 
  /**
   * Defined : Create api_wine_multi_server / multi server or switch to databases
   * @since wine v1.3.1.1
   * @since vanilla v1.3.0.0
   * @since 04.30.2022
   **/ 
  api_wine_multi_server( new mysqli('localhost','root','','multiserver'), [ 'api_wine_makes' => function() {
      
    return [

      'debug'          => false,
      'query'          => ['mixed' => [ "SQL goes here" ] ] 
      
    ];

  }], function() { ...  }
  
  );
```

```PHP
 /**
   * Defined : Read api_wine_multi_server / multi server or switch to databases
   * @since wine v1.3.1.1
   * @since vanilla v1.3.0.0
   * @since 04.30.2022
   **/   
  api_wine_multi_server( new mysqli('localhost','root','','multiserver'), [ 'api_wine_fetch' => function() {
      
    return [

      'debug'          => false,
      'query'          => ['mixed' => [ "SQL goes here" ] ]
    
    ];
    
  }], function() { ...  }
  
  );   
```
```PHP
  /**
   * Defined : Update api_wine_multi_server / multi server or switch to databases
   * @since wine v1.3.1.1
   * @since vanilla v1.3.0.0
   * @since 04.30.2022
   **/ 
  api_wine_multi_server( new mysqli('localhost','root','','multiserver'), [ 'api_wine_put' => function() {
      
    return [

      'debug'          => false,
      'query'          => ['mixed' => [ "SQL goes here" ] ]
      
    ];

  }], function() { ...  }
  
  );   
```
```PHP
  /**
   * Defined : Delete api_wine_multi_server / multi server or switch to databases
   * @since wine v1.3.1.1
   * @since vanilla v1.3.0.0
   * @since 04.30.2022
   **/ 
  api_wine_multi_server( new mysqli('localhost','root','','multiserver'), [ 'api_wine_delete' => function() {
      
    return [

      'debug'          => false,
      'query'          => ['mixed' => [ "SQL goes here" ] ]
    
    ];

  }], function() { ...  }
  
  );   
```
Download <a href="https://github.com/nielsofficeofficial/PHPWine"> PHPWine > </a> <br />
Download <a href="https://github.com/nielsofficeofficial/PHPCrud"> PHPCrud > </a>

<h2>Thanks To:</h2>
<h5>
Github : To allow me to upload my PHPWine plugin Vanilla Flavour to repository<br /> 
php.net : To oppurtunity Develop web application using corePHP - PHPFrameworks<br />
</h5>


<hr />
Would you like me to treat a cake and coffee ? <br />
Become a donor, Because with you! We can build more... 

Donate: <br />
GCash : +639650332900 <br /> 
Paypal account: syncdevprojects@gmail.com
<hr />
<br />
Thanks and good luck! 
