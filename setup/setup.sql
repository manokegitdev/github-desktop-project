
CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `created_at` datetime DEFAULT NULL COMMENT 'date create data',
  `created_by` varchar(32) DEFAULT NULL COMMENT 'username to create data',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `role` VALUES (1,'admin','2020-12-11 16:56:02','system');


CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `code` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `created_at` datetime DEFAULT NULL COMMENT 'date create data',
  `created_by` varchar(32) DEFAULT NULL COMMENT 'username to create data',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Table structure for table `admin_user`
--
CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'key',
  `fname` varchar(32) DEFAULT NULL COMMENT 'firstname',
  `lname` varchar(32) DEFAULT NULL COMMENT 'lastname',
  `email` varchar(32) DEFAULT NULL COMMENT 'email',
  `phone` varchar(10) DEFAULT NULL COMMENT 'phone number',
  `uname` varchar(32) DEFAULT NULL COMMENT 'username',
  `pword` varchar(32) DEFAULT NULL COMMENT 'password',
  `is_lock` char(1) DEFAULT 'n' COMMENT 'flag is lock or not',
  `role_id` int(11) NOT NULL COMMENT 'pk role',
  `created_at` datetime DEFAULT NULL COMMENT 'date create data',
  `created_by` varchar(32) DEFAULT NULL COMMENT 'username to create data',
  `updated_at` datetime DEFAULT NULL COMMENT 'date update data',
  `updated_by` varchar(32) DEFAULT NULL COMMENT 'username to update data',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='collect data of member and shop member';



--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` VALUES (1,'admin','system','admin@isalad.com','02000000','admin','admin','n',0,'2020-12-11 16:56:02','system','2020-12-11 16:56:02','system');


--
-- Table structure for table `category`
--

CREATE TABLE `withdraw` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_id` varchar(100) DEFAULT NULL,
  `account_number` varchar(15),
  `account_name` varchar(50),
  `amount_to_withdraw` decimal(10,2),
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;



CREATE TABLE `deposit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_id` varchar(100) DEFAULT NULL,
  `account_number` varchar(15),
  `account_name` varchar(50),
  `amount_to_withdraw` decimal(10,2),
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


CREATE TABLE `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_at` datetime DEFAULT NULL,
  `ref_no` varchar(100) DEFAULT NULL,
  `transfer_in` decimal(10,2),
  `fee` decimal(6,2),
  `net_balance` decimal(10,2),
  `status` int default 0,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `package` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `desc` varchar(100) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `profit_per_day` decimal(3,2) NOT NULL,
  `package_date` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL COMMENT 'date create data',
  `created_by` varchar(32) DEFAULT NULL COMMENT 'username to create data',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `fullname` varchar(32) NOT NULL,
  username varchar(32) not null,
  `password` varchar(32) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `status` varchar(32) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into member(fullname,username,password,mobile,status,created_at,created_by)
values('Member Test','member','123456','0974966517','y',now(),'system');

CREATE TABLE `member_bank` (
  `id` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `acc_name` varchar(32) NOT NULL,
  `acc_no` varchar(32) NOT NULL,
  
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `member_package` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `member_credit` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;