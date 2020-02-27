
CREATE TABLE `BankAccount` (
    `aid` int  NOT NULL AUTO_INCREMENT,
  `anum` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `amount` int(20) NOT NULL,
  `acctype` varchar(20) NOT NULL,
  `pphone` varchar(15) NOT NULL,
  PRIMARY KEY (aid)
); 

INSERT INTO `BankAccount` (`anum`, `fname`,`lname`,`amount`,`acctype`, `pphone`) VALUES
(1234567899, 'Fred',' Mensah', 500,'savings','0987676667'),
(9987654321, 'Amont',' Amoah', 1000,'savings','5467854367');




CREATE TABLE `ulogin` (
  `uid` int NOT NULL AUTO_INCREMENT,
  `anum` varchar(100) NOT NULL,
  `upass` varchar(200) NOT NULL,
  PRIMARY KEY(uid)
);

INSERT INTO `ulogin` ( `anum`, `upass`) VALUES
('1234567899', 'person1'),
('9987654321', 'person2');
