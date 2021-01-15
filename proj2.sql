CREATE TABLE `user` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`username` varchar(100) NOT NULL UNIQUE,
	`email` varchar(100) NOT NULL UNIQUE,
	`passwd` varchar(64) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `comments` (
	`id` INT NOT NULL AUTO_INCREMENT UNIQUE,
	`comment` varchar(255),
	`user` varchar(50),
	`post` INT(11) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `post` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`title` varchar(100) NOT NULL,
	`cont` varchar(255) NOT NULL,
	`user` varchar(100) NOT NULL,
	`createdate` DATE NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `post_has_tags` (
	`post_id` INT(11) NOT NULL,
	`tags_id` INT NOT NULL
);

CREATE TABLE `tags` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`tag` varchar(45) NOT NULL UNIQUE,
	PRIMARY KEY (`id`)
);

ALTER TABLE `comments` ADD CONSTRAINT `comments_fk0` FOREIGN KEY (`user`) REFERENCES `user`(`username`);

ALTER TABLE `comments` ADD CONSTRAINT `comments_fk1` FOREIGN KEY (`post`) REFERENCES `post`(`id`);

ALTER TABLE `post` ADD CONSTRAINT `post_fk0` FOREIGN KEY (`user`) REFERENCES `user`(`username`);

ALTER TABLE `post_has_tags` ADD CONSTRAINT `post_has_tags_fk0` FOREIGN KEY (`post_id`) REFERENCES `post`(`id`);

ALTER TABLE `post_has_tags` ADD CONSTRAINT `post_has_tags_fk1` FOREIGN KEY (`tags_id`) REFERENCES `tags`(`id`);

