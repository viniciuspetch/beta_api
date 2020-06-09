CREATE TABLE `characters` (
  `id` int PRIMARY KEY,
  `name` varchar(128) NOT NULL,
  `description` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
);
CREATE TABLE `creators` (
  `id` int PRIMARY KEY,
  `first_name` varchar(128) NOT NULL,
  `middle_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `full_name` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
);
CREATE TABLE `events` (
  `id` int PRIMARY KEY,
  `name` varchar(128) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
);
CREATE TABLE `series` (
  `id` int PRIMARY KEY,
  `name` varchar(128) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
);
CREATE TABLE `comics` (
  `id` int PRIMARY KEY,
  `name` varchar(128) NOT NULL,
  `series_id` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
);
CREATE TABLE `stories` (
  `id` int PRIMARY KEY,
  `name` varchar(128) NOT NULL,
  `comic_id` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
);
CREATE TABLE `character_story` (
  `id` int PRIMARY KEY,
  `character_id` int NOT NULL,
  `story_id` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
);
CREATE TABLE `character_creator` (
  `id` int PRIMARY KEY,
  `character_id` int NOT NULL,
  `creator_id` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
);
CREATE TABLE `creator_story` (
  `id` int PRIMARY KEY,
  `story_id` int NOT NULL,
  `creator_id` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
);
CREATE TABLE `events_story` (
  `id` int PRIMARY KEY,
  `event_id` int NOT NULL,
  `story_id` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
);
ALTER TABLE `comics`
ADD FOREIGN KEY (`series_id`) REFERENCES `series` (`id`);
ALTER TABLE `stories`
ADD FOREIGN KEY (`story_id`) REFERENCES `comics` (`id`);
ALTER TABLE `character_story`
ADD FOREIGN KEY (`character_id`) REFERENCES `characters` (`id`);
ALTER TABLE `character_story`
ADD FOREIGN KEY (`story_id`) REFERENCES `stories` (`id`);
ALTER TABLE `character_creator`
ADD FOREIGN KEY (`character_id`) REFERENCES `characters` (`id`);
ALTER TABLE `character_creator`
ADD FOREIGN KEY (`creator_id`) REFERENCES `creators` (`id`);
ALTER TABLE `creator_story`
ADD FOREIGN KEY (`story_id`) REFERENCES `stories` (`id`);
ALTER TABLE `creator_story`
ADD FOREIGN KEY (`creator_id`) REFERENCES `creators` (`id`);
ALTER TABLE `events_stories`
ADD FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);
ALTER TABLE `events_stories`
ADD FOREIGN KEY (`story_id`) REFERENCES `stories` (`id`);