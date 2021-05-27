# DB 생성
DROP DATABASE IF EXISTS php_test_4;
CREATE DATABASE php_test_4;
USE php_test_4;

# article Table 생성
CREATE TABLE article(
  id INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  regDate DATETIME NOT NULL,
  updateDate DATETIME NOT NULL,
  title VARCHAR(100) NOT NULL,
  `body` TEXT NOT NULL
);

# article에 boardId 추가
ALTER TABLE article ADD COLUMN boardId INT(10) UNSIGNED NOT NULL AFTER id;
ALTER TABLE article ADD COLUMN memberId INT(10) UNSIGNED NOT NULL AFTER boardId;


# 게시물 생성
INSERT INTO article
SET boardId = 1,
memberId = 2,
regDate = NOW(),
updateDate = NOW(),
title = '제목1',
`body` = '내용1';

INSERT INTO article
SET boardId = 1,
memberId = 1,
regDate = NOW(),
updateDate = NOW(),
title = '제목2',
`body` = '내용2';

INSERT INTO article
SET boardId = 2,
memberId = 3,
regDate = NOW(),
updateDate = NOW(),
title = '제목3',
`body` = '내용3';

SELECT LAST_INSERT_ID();


# member Table 생성
CREATE TABLE `member`(
  id INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  regDate DATETIME NOT NULL,
  updateDate DATETIME NOT NULL,
  loginId VARCHAR(20) NOT NULL,
  loginPw VARCHAR(100) NOT NULL,
  `name` VARCHAR(20) NOT NULL,
  nickName VARCHAR(20) NOT NULL,
  email VARCHAR(100) NOT NULL
);


# test member 생성
INSERT INTO `member`
SET regDate = NOW(),
updateDate = NOW(),
loginId = 'user1',
loginPw = 'user1',
`name` = '철수',
nickName = '둘리',
email = 'hoi@asd.com';

INSERT INTO `member`
SET regDate = NOW(),
updateDate = NOW(),
loginId = 'user2',
loginPw = 'user2',
`name` = '영희',
nickName = '도우너',
email = 'user2@asd.com';

INSERT INTO `member`
SET regDate = NOW(),
updateDate = NOW(),
loginId = 'user3',
loginPw = 'user3',
`name` = '길동',
nickName = '또치',
email = 'dong@asd.com';

INSERT INTO `member`
SET regDate = NOW(),
updateDate = NOW(),
loginId = 'user4',
loginPw = 'user4',
`name` = '희동',
nickName = '공실이',
email = 'dongdong@asd.com';

# board Table 생성
CREATE TABLE board(
  id INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(20) NOT NULL,
  `code` VARCHAR(20) NOT NULL
);

# test board 생성
INSERT INTO board
SET `name` = '공지',
`code` = 'notice';

INSERT INTO board
SET `name` = '자유',
`code` = 'free';



# reply Table 생성
CREATE TABLE reply(
  id INT(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  regDate DATETIME NOT NULL,
  updateDate DATETIME NOT NULL,
  articleId INT(10) UNSIGNED NOT NULL,
  memberId INT(10) UNSIGNED NOT NULL,
  `body` TEXT NOT NULL
);

# test reply 생성
INSERT INTO reply
SET regDate = NOW(),
updateDate = NOW(),
articleId = 1,
memberId = 2,
`body` = '첫 댓글입니다';

INSERT INTO reply
SET regDate = NOW(),
updateDate = NOW(),
articleId = 2,
memberId = 3,
`body` = '게시물2번에 3번유저';

INSERT INTO reply
SET regDate = NOW(),
updateDate = NOW(),
articleId = 2,
memberId = 1,
`body` = '롸롸롸롸롸롸롸';


