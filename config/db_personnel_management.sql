CREATE DATABASE db_personnel_management;

USE db_personnel_management;


CREATE TABLE `persons` (
  `id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `persons` (`id`, `project_id`, `name`) VALUES
(1, 1, 'Laura'),
(2, 1, 'Oliver'),
(3, 2, 'Stephan'),
(4, 2, 'Brigitta'),
(5, 2, 'Heiner'),
(6, NULL, 'Victoria');


CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `projects` (`id`, `name`) VALUES
(1, 'Java'),
(2, 'PHP');


ALTER TABLE `persons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);


ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `persons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;


ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `persons`
  ADD CONSTRAINT `project_id` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;
