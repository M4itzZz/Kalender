CREATE TABLE 'events' (
  'id' int(11) NOT NULL,
  'title' varchar(255) COLLATE utf8_bin NOT NULL,
  'start' datetime NOT NULL,
  'end' datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;