CREATE TABLE `calcNewDate` (
  `id` int(11) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `data` date NOT NULL,
  `days` int(11) NOT NULL,
  `result` date NOT NULL,
  `time` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `calcNewDate`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `calcNewDate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

