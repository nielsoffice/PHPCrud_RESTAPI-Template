# PHPCrud_RESTAPI-Template
Resful-api using PHPCrud snippet 

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
