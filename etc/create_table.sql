-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2016-04-09 22:21:52.886




-- tables
-- Table account
CREATE TABLE account (
    username varchar(30)  NOT NULL,
    password varchar(30)  NOT NULL,
    addr varchar(30)  NOT NULL,
    detail text  NOT NULL,
    CONSTRAINT account_pk PRIMARY KEY (username)
);

CREATE INDEX account_idx_1 ON account (username);


-- Table comment
CREATE TABLE comment (
    commentid int  NOT NULL  AUTO_INCREMENT,
    username varchar(30)  NOT NULL,
    mediaid int  NOT NULL,
    content text  NOT NULL,
    posttime timestamp  NOT NULL  DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT comment_pk PRIMARY KEY (commentid)
);

CREATE INDEX comment_idx_1 ON comment (commentid);


CREATE INDEX comment_idx_2 ON comment (mediaid);


-- Table contact
CREATE TABLE contact (
    userid1 varchar(30)  NOT NULL,
    userid2 varchar(30)  NOT NULL,
    type int  NOT NULL,
    CONSTRAINT contact_pk PRIMARY KEY (userid1,userid2)
);

CREATE INDEX contact_idx_1 ON contact (userid1,type);


CREATE INDEX contact_idx_2 ON contact (userid1,userid2);


-- Table discuss
CREATE TABLE discuss (
    discussid int  NOT NULL  AUTO_INCREMENT,
    groupid int  NOT NULL,
    username varchar(30)  NOT NULL,
    content text  NOT NULL,
    posttime timestamp  NOT NULL  DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT discuss_pk PRIMARY KEY (discussid)
);

-- Table favorite
CREATE TABLE favorite (
    username varchar(30)  NOT NULL,
    mediaid int  NOT NULL,
    CONSTRAINT favorite_pk PRIMARY KEY (username,mediaid)
);

CREATE INDEX favorite_idx_1 ON favorite (username);


CREATE INDEX favorite_idx_2 ON favorite (username,mediaid);


-- Table groups
CREATE TABLE groups (
    groupid int  NOT NULL  AUTO_INCREMENT,
    groupname varchar(30)  NOT NULL,
    topic varchar(30)  NOT NULL,
    detail text  NOT NULL,
    CONSTRAINT groups_pk PRIMARY KEY (groupid)
);

CREATE INDEX groups_idx_1 ON groups (groupid);


-- Table media
CREATE TABLE media (
    mediaid int  NOT NULL  AUTO_INCREMENT,
    title varchar(30)  NOT NULL,
    username varchar(30)  NOT NULL,
    type int  NOT NULL,
    category int  NOT NULL,
    sharetype int  NOT NULL,
    path varchar(30)  NOT NULL,
    detail text  NOT NULL,
    posttime timestamp  NOT NULL  DEFAULT CURRENT_TIMESTAMP,
    candiscuss int  NOT NULL,
    canrate int  NOT NULL,
    keywords text  NOT NULL,
    viewcount int  NOT NULL  DEFAULT 0,
    avgrate double(4,3)  NOT NULL  DEFAULT 0,
    CONSTRAINT media_pk PRIMARY KEY (mediaid)
);

CREATE INDEX media_idx_1 ON media (mediaid);


CREATE INDEX media_idx_2 ON media (username);


CREATE INDEX media_idx_3 ON media (type);


CREATE INDEX media_idx_4 ON media (type,category,posttime);


CREATE INDEX media_idx_5 ON media (posttime);


CREATE INDEX media_idx_6 ON media (category);


CREATE INDEX media_idx_7 ON media (type,posttime);


CREATE INDEX media_idx_8 ON media (type,category);


-- Table message
CREATE TABLE message (
    messageid int  NOT NULL  AUTO_INCREMENT,
    sender varchar(30)  NOT NULL,
    receiver varchar(30)  NOT NULL,
    content text  NOT NULL,
    posttime timestamp  NOT NULL  DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT message_pk PRIMARY KEY (messageid)
);

-- Table playlist
CREATE TABLE playlist (
    playlistid int  NOT NULL  AUTO_INCREMENT,
    playlistname varchar(30)  NOT NULL,
    username varchar(30)  NOT NULL,
    CONSTRAINT playlist_pk PRIMARY KEY (playlistid)
);

CREATE INDEX playlist_idx_1 ON playlist (username);


-- Table playlistmedia
CREATE TABLE playlistmedia (
    playlistid int  NOT NULL,
    mediaid int  NOT NULL,
    CONSTRAINT playlistmedia_pk PRIMARY KEY (playlistid,mediaid)
);

CREATE INDEX playlistmedia_idx_1 ON playlistmedia (playlistid);


CREATE INDEX playlistmedia_idx_2 ON playlistmedia (playlistid,mediaid);


-- Table rate
CREATE TABLE rate (
    mediaid int  NOT NULL,
    username varchar(30)  NOT NULL,
    score int  NOT NULL,
    CONSTRAINT rate_pk PRIMARY KEY (mediaid,username)
);

CREATE INDEX rate_idx_1 ON rate (mediaid,username);


CREATE INDEX rate_idx_2 ON rate (mediaid);


-- Table sharedfriends
CREATE TABLE sharedfriends (
    mediaid int  NOT NULL,
    username varchar(30)  NOT NULL,
    CONSTRAINT sharedfriends_pk PRIMARY KEY (mediaid,username)
);

CREATE INDEX sharedfriends_idx_1 ON sharedfriends (username);


CREATE INDEX sharedfriends_idx_2 ON sharedfriends (mediaid,username);


CREATE INDEX sharedfriends_idx_3 ON sharedfriends (mediaid);


-- Table subscription
CREATE TABLE subscription (
    subscriber_id varchar(30)  NOT NULL,
    channel_id varchar(30)  NOT NULL,
    CONSTRAINT subscription_pk PRIMARY KEY (subscriber_id,channel_id)
);

CREATE INDEX subscription_idx_1 ON subscription (subscriber_id,channel_id);






-- foreign keys
-- Reference:  comment_post (table: comment)

ALTER TABLE comment ADD CONSTRAINT comment_post FOREIGN KEY comment_post (mediaid)
    REFERENCES media (mediaid);
-- Reference:  comment_user (table: comment)

ALTER TABLE comment ADD CONSTRAINT comment_user FOREIGN KEY comment_user (username)
    REFERENCES account (username);
-- Reference:  contact_user (table: contact)

ALTER TABLE contact ADD CONSTRAINT contact_user FOREIGN KEY contact_user (userid1)
    REFERENCES account (username);
-- Reference:  contact_user1 (table: contact)

ALTER TABLE contact ADD CONSTRAINT contact_user1 FOREIGN KEY contact_user1 (userid2)
    REFERENCES account (username);
-- Reference:  favorite_post (table: favorite)

ALTER TABLE favorite ADD CONSTRAINT favorite_post FOREIGN KEY favorite_post (mediaid)
    REFERENCES media (mediaid);
-- Reference:  favorite_user (table: favorite)

ALTER TABLE favorite ADD CONSTRAINT favorite_user FOREIGN KEY favorite_user (username)
    REFERENCES account (username);
-- Reference:  groupaccount_account (table: discuss)

ALTER TABLE discuss ADD CONSTRAINT groupaccount_account FOREIGN KEY groupaccount_account (username)
    REFERENCES account (username);
-- Reference:  groupaccount_group (table: discuss)

ALTER TABLE discuss ADD CONSTRAINT groupaccount_group FOREIGN KEY groupaccount_group (groupid)
    REFERENCES groups (groupid);
-- Reference:  message_contact (table: message)

ALTER TABLE message ADD CONSTRAINT message_contact FOREIGN KEY message_contact (sender,receiver)
    REFERENCES contact (userid1,userid2);
-- Reference:  playlistHelper_playlist (table: playlistmedia)

ALTER TABLE playlistmedia ADD CONSTRAINT playlistHelper_playlist FOREIGN KEY playlistHelper_playlist (playlistid)
    REFERENCES playlist (playlistid);
-- Reference:  playlistHelper_post (table: playlistmedia)

ALTER TABLE playlistmedia ADD CONSTRAINT playlistHelper_post FOREIGN KEY playlistHelper_post (mediaid)
    REFERENCES media (mediaid);
-- Reference:  playlist_user (table: playlist)

ALTER TABLE playlist ADD CONSTRAINT playlist_user FOREIGN KEY playlist_user (username)
    REFERENCES account (username);
-- Reference:  post_user (table: media)

ALTER TABLE media ADD CONSTRAINT post_user FOREIGN KEY post_user (username)
    REFERENCES account (username);
-- Reference:  rate_account (table: rate)

ALTER TABLE rate ADD CONSTRAINT rate_account FOREIGN KEY rate_account (username)
    REFERENCES account (username);
-- Reference:  rate_media (table: rate)

ALTER TABLE rate ADD CONSTRAINT rate_media FOREIGN KEY rate_media (mediaid)
    REFERENCES media (mediaid);
-- Reference:  subscribe (table: subscription)

ALTER TABLE subscription ADD CONSTRAINT subscribe FOREIGN KEY subscribe (channel_id)
    REFERENCES account (username);
-- Reference:  subscription_user (table: subscription)

ALTER TABLE subscription ADD CONSTRAINT subscription_user FOREIGN KEY subscription_user (subscriber_id)
    REFERENCES account (username);
-- Reference:  unblock_account (table: sharedfriends)

ALTER TABLE sharedfriends ADD CONSTRAINT unblock_account FOREIGN KEY unblock_account (username)
    REFERENCES account (username);
-- Reference:  unblock_media (table: sharedfriends)

ALTER TABLE sharedfriends ADD CONSTRAINT unblock_media FOREIGN KEY unblock_media (mediaid)
    REFERENCES media (mediaid);



-- End of file.
