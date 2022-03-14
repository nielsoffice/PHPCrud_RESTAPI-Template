# PHPCrud_RESTAPI-Template
Resful-api using PHPCrud snippet 

```SQL

CREATE TABLE `friend_categories` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cat_id`)
);

INSERT INTO `friend_categories` (`cat_id`, `name`) VALUES
(1, 'School'),
(2, 'Church'),
(3, 'Work'),
(4, 'Music'),
(5, 'Activity');

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
(1, 1, 'Jhon', 'jhon@mail.com','Best friend'),
(2, 2, 'Lee', 'lee@mail.com','Friend'),
(4, 4, 'Sai', 'sai@mail.com','Teacher'),
(5, 4, 'Iannah', 'nah@mail.com','Best friend'),
(6, 1, 'Dash', 'dash@mail.com','Friend');

```
