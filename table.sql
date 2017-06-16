CREATE TABLE IF NOT EXISTS `weblinks` (
  `userid` int(11) NOT NULL,
  `steamid` varchar(64) NOT NULL,
  `serverkey` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;
