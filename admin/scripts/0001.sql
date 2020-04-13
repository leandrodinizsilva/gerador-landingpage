CREATE TABLE `template_url` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `id_template` int(10) NOT NULL,
  `date_start` time NOT NULL,
  `date_end` time NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `template_2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `main_color` varchar(7) NOT NULL,
  `secondary_color` varchar(7) NOT NULL,
  `main_text_color` varchar(7) NOT NULL,
  `secondary_text_color` varchar(7) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);
