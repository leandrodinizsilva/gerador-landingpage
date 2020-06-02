CREATE TABLE `template` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `titulo` varchar(40) NOT NULL,
  `logotipo` varchar(20) NOT NULL,
  `cor_primaria` varchar(7) NOT NULL,
  `cor_secundaria` varchar(7) NOT NULL,
  `cor_terciaria` varchar(7) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
)

CREATE TABLE `template_2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `main_text` varchar(255) NOT NULL,
  `background_image` varchar(255) NOT NULL,
  `main_color` varchar(7) NOT NULL,
  `secondary_color` varchar(7) NOT NULL,
  `main_text_color` varchar(7) NOT NULL,
  `secondary_text_color` varchar(7) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
)

CREATE TABLE `template_block1_2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template_id` int(11) NOT NULL,
  `text_1` varchar(255) NOT NULL,
  `text_2` varchar(255) NOT NULL,
  `text_3` varchar(255) NOT NULL,
  `icon_1` varchar(255) NOT NULL,
  `icon_2` varchar(255) NOT NULL,
  `icon_3` varchar(255) NOT NULL,
  `title_1` varchar(255) NOT NULL,
  `title_2` varchar(255) NOT NULL,
  `title_3` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
)

CREATE TABLE `template_block2_2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template_id` int(11) NOT NULL,
  `text_1` varchar(255) NOT NULL,
  `image_1` varchar(255) NOT NULL,
  `text_2` varchar(255) NOT NULL,
  `image_2` varchar(255) NOT NULL,
  `text_3` varchar(255) NOT NULL,
  `image_3` varchar(255) NOT NULL,
  `title_1` varchar(255) NOT NULL,
  `title_2` varchar(255) NOT NULL,
  `title_3` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
)

CREATE TABLE `template_footer_2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template_id` int(11) NOT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `background_img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
)

CREATE TABLE `template_testimonial_2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template_id` int(11) NOT NULL,
  `name_1` varchar(255) NOT NULL,
  `testimonial_1` varchar(255) NOT NULL,
  `name_2` varchar(255) NOT NULL,
  `testimonial_2` varchar(255) NOT NULL,
  `name_3` varchar(255) NOT NULL,
  `testimonial_3` varchar(255) NOT NULL,
  `image_1` varchar(255) NOT NULL,
  `image_2` varchar(255) NOT NULL,
  `image_3` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
)

CREATE TABLE `template_url` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `id_template` int(10) NOT NULL,
  `date_start` time NOT NULL,
  `date_end` time NOT NULL,
  PRIMARY KEY (`id`)
)

CREATE TABLE `template_url_2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `template_id` int(10) NOT NULL,
  `date_start` time NOT NULL,
  `date_end` time NOT NULL,
  PRIMARY KEY (`id`)
)

CREATE TABLE `active_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `template_id` int(11) NOT NULL,
  `table_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
)

ALTER TABLE `template_2` DROP `active`;

ALTER TABLE `template_2` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `template_block1_2` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `template_block2_2` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `template_footer_2` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `template_testimonial_2` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT;