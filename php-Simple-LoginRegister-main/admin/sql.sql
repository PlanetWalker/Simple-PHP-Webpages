CREATE TABLE IF NOT EXISTS `login` (
`user_id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `user_name` varchar(256) NOT NULL,
  `user_email` varchar(256) NOT NULL,
  `user_password` varchar(256) NOT NULL,
  `user_rank` varchar(20) NOT NULL
);

CREATE TABLE IF NOT EXISTS `mitglieder` (
  `member_id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `member_name` varchar(256) NOT NULL,
  `member_discord` varchar(256) NOT NULL,
  `member_beschreibung` varchar(256) NOT NULL,
  `member_protokoll` varchar(20) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO `mitglieder`(`member_name`, `member_discord`, `member_beschreibung`, `member_protokoll`) VALUES ("1","1","1","1");

CREATE TABLE IF NOT EXISTS `securitycode` (
  `code_id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `code_code` text NOT NULL,
  `code_rank` varchar(20) NOT NULL
);


INSERT INTO `securitycode` (`code_code`, `code_rank`) VALUES ('B56885','owner');