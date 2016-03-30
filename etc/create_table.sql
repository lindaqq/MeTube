-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2016-03-29 20:56:44.018




-- tables
-- Table account
CREATE TABLE account (
    id int  NOT NULL  AUTO_INCREMENT,
    username varchar(30)  NOT NULL,
    password varchar(30)  NOT NULL,
    addr varchar(30)  NOT NULL,
    detail text  NOT NULL,
    CONSTRAINT account_pk PRIMARY KEY (id)
);

-- Table audio
CREATE TABLE audio (
    post_id int  NOT NULL,
    CONSTRAINT audio_pk PRIMARY KEY (post_id)
);

-- Table block
CREATE TABLE block (
    mediaid int  NOT NULL,
    account_id int  NOT NULL,
    CONSTRAINT block_pk PRIMARY KEY (mediaid,account_id)
);

-- Table comment
CREATE TABLE comment (
    id int  NOT NULL  AUTO_INCREMENT,
    post_id int  NOT NULL,
    text text  NOT NULL,
    user_id int  NOT NULL,
    CONSTRAINT comment_pk PRIMARY KEY (id)
);

-- Table contact
CREATE TABLE contact (
    userid1 int  NOT NULL,
    userid2 int  NOT NULL,
    type int  NOT NULL,
    CONSTRAINT contact_pk PRIMARY KEY (userid1,userid2)
);

-- Table favorite
CREATE TABLE favorite (
    favorite_id int  NOT NULL,
    user_id int  NOT NULL,
    post_id int  NOT NULL,
    CONSTRAINT favorite_pk PRIMARY KEY (favorite_id)
);

-- Table `group`
CREATE TABLE `group` (
    groupid int  NOT NULL,
    account_id int  NOT NULL,
    CONSTRAINT group_pk PRIMARY KEY (groupid)
);

-- Table image
CREATE TABLE image (
    post_id int  NOT NULL,
    CONSTRAINT image_pk PRIMARY KEY (post_id)
);

-- Table media
CREATE TABLE media (
    mediaid int  NOT NULL  AUTO_INCREMENT,
    title varchar(30)  NOT NULL,
    user_id int  NOT NULL,
    mediatype int  NOT NULL,
    category varchar(30)  NOT NULL,
    sharetype int  NOT NULL,
    block int  NOT NULL,
    path varchar(30)  NOT NULL,
    detail varchar(200)  NOT NULL,
    post_time date  NOT NULL,
    candiscuss int  NOT NULL,
    canrating int  NOT NULL,
    tags text  NOT NULL,
    view_count int  NOT NULL,
    avgrate int  NOT NULL,
    CONSTRAINT media_pk PRIMARY KEY (mediaid)
);

-- Table message
CREATE TABLE message (
    messageid int  NOT NULL  AUTO_INCREMENT,
    type int  NOT NULL,
    `from` int  NOT NULL,
    `to` int  NOT NULL,
    CONSTRAINT message_pk PRIMARY KEY (messageid)
);

-- Table playlist
CREATE TABLE playlist (
    id int  NOT NULL  AUTO_INCREMENT,
    user_id int  NOT NULL,
    CONSTRAINT playlist_pk PRIMARY KEY (id)
);

-- Table playlistHelper
CREATE TABLE playlistHelper (
    id int  NOT NULL  AUTO_INCREMENT,
    playlist_id int  NOT NULL,
    post_id int  NOT NULL,
    CONSTRAINT playlistHelper_pk PRIMARY KEY (id)
);

-- Table rate
CREATE TABLE rate (
    rate_id int  NOT NULL  AUTO_INCREMENT,
    mediaid int  NOT NULL,
    account_id int  NOT NULL,
    CONSTRAINT rate_pk PRIMARY KEY (rate_id)
);

-- Table subscription
CREATE TABLE subscription (
    id int  NOT NULL  AUTO_INCREMENT,
    subscriber_id int  NOT NULL,
    channel_id int  NOT NULL,
    CONSTRAINT subscription_pk PRIMARY KEY (id)
);

-- Table unblock
CREATE TABLE unblock (
    mediaid int  NOT NULL,
    account_id int  NOT NULL,
    CONSTRAINT unblock_pk PRIMARY KEY (mediaid,account_id)
);

-- Table video
CREATE TABLE video (
    post_id int  NOT NULL,
    CONSTRAINT video_pk PRIMARY KEY (post_id)
);





-- foreign keys
-- Reference:  audio_post (table: audio)

ALTER TABLE audio ADD CONSTRAINT audio_post FOREIGN KEY audio_post (post_id)
    REFERENCES media (mediaid);
-- Reference:  block_account (table: block)

ALTER TABLE block ADD CONSTRAINT block_account FOREIGN KEY block_account (account_id)
    REFERENCES account (id);
-- Reference:  block_media (table: block)

ALTER TABLE block ADD CONSTRAINT block_media FOREIGN KEY block_media (mediaid)
    REFERENCES media (mediaid);
-- Reference:  comment_post (table: comment)

ALTER TABLE comment ADD CONSTRAINT comment_post FOREIGN KEY comment_post (post_id)
    REFERENCES media (mediaid);
-- Reference:  comment_user (table: comment)

ALTER TABLE comment ADD CONSTRAINT comment_user FOREIGN KEY comment_user (user_id)
    REFERENCES account (id);
-- Reference:  contact_user (table: contact)

ALTER TABLE contact ADD CONSTRAINT contact_user FOREIGN KEY contact_user (userid1)
    REFERENCES account (id);
-- Reference:  contact_user1 (table: contact)

ALTER TABLE contact ADD CONSTRAINT contact_user1 FOREIGN KEY contact_user1 (userid2)
    REFERENCES account (id);
-- Reference:  favorite_post (table: favorite)

ALTER TABLE favorite ADD CONSTRAINT favorite_post FOREIGN KEY favorite_post (post_id)
    REFERENCES media (mediaid);
-- Reference:  favorite_user (table: favorite)

ALTER TABLE favorite ADD CONSTRAINT favorite_user FOREIGN KEY favorite_user (user_id)
    REFERENCES account (id);
-- Reference:  group_account (table: `group`)

ALTER TABLE `group` ADD CONSTRAINT group_account FOREIGN KEY group_account (account_id)
    REFERENCES account (id);
-- Reference:  image_post (table: image)

ALTER TABLE image ADD CONSTRAINT image_post FOREIGN KEY image_post (post_id)
    REFERENCES media (mediaid);
-- Reference:  playlistHelper_playlist (table: playlistHelper)

ALTER TABLE playlistHelper ADD CONSTRAINT playlistHelper_playlist FOREIGN KEY playlistHelper_playlist (playlist_id)
    REFERENCES playlist (id);
-- Reference:  playlistHelper_post (table: playlistHelper)

ALTER TABLE playlistHelper ADD CONSTRAINT playlistHelper_post FOREIGN KEY playlistHelper_post (post_id)
    REFERENCES media (mediaid);
-- Reference:  playlist_user (table: playlist)

ALTER TABLE playlist ADD CONSTRAINT playlist_user FOREIGN KEY playlist_user (user_id)
    REFERENCES account (id);
-- Reference:  post_user (table: media)

ALTER TABLE media ADD CONSTRAINT post_user FOREIGN KEY post_user (user_id)
    REFERENCES account (id);
-- Reference:  rate_account (table: rate)

ALTER TABLE rate ADD CONSTRAINT rate_account FOREIGN KEY rate_account (account_id)
    REFERENCES account (id);
-- Reference:  rate_media (table: rate)

ALTER TABLE rate ADD CONSTRAINT rate_media FOREIGN KEY rate_media (mediaid)
    REFERENCES media (mediaid);
-- Reference:  subscribe (table: subscription)

ALTER TABLE subscription ADD CONSTRAINT subscribe FOREIGN KEY subscribe (channel_id)
    REFERENCES account (id);
-- Reference:  subscription_user (table: subscription)

ALTER TABLE subscription ADD CONSTRAINT subscription_user FOREIGN KEY subscription_user (subscriber_id)
    REFERENCES account (id);
-- Reference:  unblock_account (table: unblock)

ALTER TABLE unblock ADD CONSTRAINT unblock_account FOREIGN KEY unblock_account (account_id)
    REFERENCES account (id);
-- Reference:  unblock_media (table: unblock)

ALTER TABLE unblock ADD CONSTRAINT unblock_media FOREIGN KEY unblock_media (mediaid)
    REFERENCES media (mediaid);
-- Reference:  video_post (table: video)

ALTER TABLE video ADD CONSTRAINT video_post FOREIGN KEY video_post (post_id)
    REFERENCES media (mediaid);



-- End of file.
