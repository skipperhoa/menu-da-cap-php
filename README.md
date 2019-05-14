# menu-da-cap-php
```sh
 CREATE TABLE IF NOT EXISTS `menu` (
`menu_id` int(11) NOT NULL AUTO_INCREMENT,
 `menu_title` varchar(255) DEFAULT NULL,
 `menu_link` varchar(500) DEFAULT NULL,
 `menu_parent_id` int(11) DEFAULT NULL,
 PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
```
