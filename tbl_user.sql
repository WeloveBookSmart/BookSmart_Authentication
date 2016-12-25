 CREATE TABLE IF NOT EXISTS `tbl_user` (  
  `user_id` int(11) NOT NULL AUTO_INCREMENT,  
  `username` varchar(250) NOT NULL,  
  `password` varchar(100) NOT NULL,  
  PRIMARY KEY (`user_id`)  
 ) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ; 