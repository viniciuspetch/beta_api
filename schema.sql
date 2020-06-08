CREATE TABLE `characters` (
  `id` int PRIMARY KEY,
  `name` varchar(255) NOT NULL
);

CREATE TABLE `creators` (
  `id` int PRIMARY KEY,
  `name` varchar(255) NOT NULL
);

CREATE TABLE `events` (
  `id` int PRIMARY KEY,
  `name` varchar(255) NOT NULL
);

CREATE TABLE `series` (
  `id` int PRIMARY KEY,
  `name` varchar(255) NOT NULL
);

CREATE TABLE `comics` (
  `id` int PRIMARY KEY,
  `name` varchar(255) NOT NULL,
  `series_id` int
);

CREATE TABLE `stories` (
  `id` int PRIMARY KEY,
  `name` varchar(255) NOT NULL,
  `comic_id` int
);

CREATE TABLE `character_story` (
  `id` int PRIMARY KEY,
  `characters_id` int,
  `stories_id` int
);

CREATE TABLE `character_creator` (
  `id` int PRIMARY KEY,
  `characters_id` int,
  `creators_id` int
);

CREATE TABLE `creator_story` (
  `id` int PRIMARY KEY,
  `stories_id` int,
  `creators_id` int
);

CREATE TABLE `events_story` (
  `id` int PRIMARY KEY,
  `events_id` int,
  `stories_id` int
);

ALTER TABLE `comics` ADD FOREIGN KEY (`series_id`) REFERENCES `series` (`id`);

ALTER TABLE `stories` ADD FOREIGN KEY (`stories_id`) REFERENCES `comics` (`id`);

ALTER TABLE `character_story` ADD FOREIGN KEY (`characters_id`) REFERENCES `characters` (`id`);

ALTER TABLE `character_story` ADD FOREIGN KEY (`stories_id`) REFERENCES `stories` (`id`);

ALTER TABLE `character_creator` ADD FOREIGN KEY (`characters_id`) REFERENCES `characters` (`id`);

ALTER TABLE `character_creator` ADD FOREIGN KEY (`creators_id`) REFERENCES `creators` (`id`);

ALTER TABLE `creator_story` ADD FOREIGN KEY (`stories_id`) REFERENCES `stories` (`id`);

ALTER TABLE `creator_story` ADD FOREIGN KEY (`creators_id`) REFERENCES `creators` (`id`);

ALTER TABLE `events_stories` ADD FOREIGN KEY (`events_id`) REFERENCES `events` (`id`);

ALTER TABLE `events_stories` ADD FOREIGN KEY (`stories_id`) REFERENCES `stories` (`id`);
