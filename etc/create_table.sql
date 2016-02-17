-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2016-02-17 03:52:48.426




-- tables
-- Table account
CREATE TABLE account (
    id int  NOT NULL  AUTO_INCREMENT,
    username varchar(30)  NOT NULL,
    password varchar(30)  NOT NULL,
    email varchar(30)  NOT NULL,
    portrait varchar(30)  NOT NULL,
    CONSTRAINT account_pk PRIMARY KEY (id)
);

-- Table audio
CREATE TABLE audio (
    post_id int  NOT NULL,
    CONSTRAINT audio_pk PRIMARY KEY (post_id)
);

-- Table category
CREATE TABLE category (
    id int  NOT NULL  AUTO_INCREMENT,
    name varchar(30)  NOT NULL,
    CONSTRAINT category_pk PRIMARY KEY (id)
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
    user_id int  NOT NULL,
    user_2_id int  NOT NULL,
    contact int  NOT NULL  AUTO_INCREMENT,
    CONSTRAINT contact_pk PRIMARY KEY (contact)
);

-- Table download
CREATE TABLE download (
    downloadid int  NOT NULL,
    user_id int  NOT NULL,
    mediaid int  NOT NULL,
    datetime date  NOT NULL,
    CONSTRAINT download_pk PRIMARY KEY (downloadid)
);

-- Table favorite
CREATE TABLE favorite (
    favorite_id int  NOT NULL,
    user_id int  NOT NULL,
    post_id int  NOT NULL,
    CONSTRAINT favorite_pk PRIMARY KEY (favorite_id)
);

-- Table image
CREATE TABLE image (
    post_id int  NOT NULL,
    CONSTRAINT image_pk PRIMARY KEY (post_id)
);

-- Table media
CREATE TABLE media (
    title varchar(30)  NOT NULL,
    user_id int  NOT NULL,
    type int  NOT NULL,
    mediaid int  NOT NULL  AUTO_INCREMENT,
    path varchar(30)  NOT NULL,
    post_time date  NOT NULL,
    tags text  NOT NULL,
    view_count int  NOT NULL,
    category_id int  NOT NULL,
    detail varchar(200)  NOT NULL,
    size int  NOT NULL,
    lastaccesstime date  NOT NULL,
    CONSTRAINT media_pk PRIMARY KEY (mediaid)
);

-- Table message
CREATE TABLE message (
    user_id int  NOT NULL,
    user_2_id int  NOT NULL,
    message_id int  NOT NULL  AUTO_INCREMENT,
    CONSTRAINT message_pk PRIMARY KEY (message_id)
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

-- Table subscription
CREATE TABLE subscription (
    id int  NOT NULL  AUTO_INCREMENT,
    subscriber_id int  NOT NULL,
    channel_id int  NOT NULL,
    CONSTRAINT subscription_pk PRIMARY KEY (id)
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
-- Reference:  comment_post (table: comment)

ALTER TABLE comment ADD CONSTRAINT comment_post FOREIGN KEY comment_post (post_id)
    REFERENCES media (mediaid);
-- Reference:  comment_user (table: comment)

ALTER TABLE comment ADD CONSTRAINT comment_user FOREIGN KEY comment_user (user_id)
    REFERENCES account (id);
-- Reference:  contact_user (table: contact)

ALTER TABLE contact ADD CONSTRAINT contact_user FOREIGN KEY contact_user (user_id)
    REFERENCES account (id);
-- Reference:  contact_user1 (table: contact)

ALTER TABLE contact ADD CONSTRAINT contact_user1 FOREIGN KEY contact_user1 (user_2_id)
    REFERENCES account (id);
-- Reference:  download_post (table: download)

ALTER TABLE download ADD CONSTRAINT download_post FOREIGN KEY download_post (mediaid)
    REFERENCES media (mediaid);
-- Reference:  download_user (table: download)

ALTER TABLE download ADD CONSTRAINT download_user FOREIGN KEY download_user (user_id)
    REFERENCES account (id);
-- Reference:  favorite_post (table: favorite)

ALTER TABLE favorite ADD CONSTRAINT favorite_post FOREIGN KEY favorite_post (post_id)
    REFERENCES media (mediaid);
-- Reference:  favorite_user (table: favorite)

ALTER TABLE favorite ADD CONSTRAINT favorite_user FOREIGN KEY favorite_user (user_id)
    REFERENCES account (id);
-- Reference:  image_post (table: image)

ALTER TABLE image ADD CONSTRAINT image_post FOREIGN KEY image_post (post_id)
    REFERENCES media (mediaid);
-- Reference:  message_user (table: message)

ALTER TABLE message ADD CONSTRAINT message_user FOREIGN KEY message_user (user_id)
    REFERENCES account (id);
-- Reference:  message_user1 (table: message)

ALTER TABLE message ADD CONSTRAINT message_user1 FOREIGN KEY message_user1 (user_2_id)
    REFERENCES account (id);
-- Reference:  playlistHelper_playlist (table: playlistHelper)

ALTER TABLE playlistHelper ADD CONSTRAINT playlistHelper_playlist FOREIGN KEY playlistHelper_playlist (playlist_id)
    REFERENCES playlist (id);
-- Reference:  playlistHelper_post (table: playlistHelper)

ALTER TABLE playlistHelper ADD CONSTRAINT playlistHelper_post FOREIGN KEY playlistHelper_post (post_id)
    REFERENCES media (mediaid);
-- Reference:  playlist_user (table: playlist)

ALTER TABLE playlist ADD CONSTRAINT playlist_user FOREIGN KEY playlist_user (user_id)
    REFERENCES account (id);
-- Reference:  post_category (table: media)

ALTER TABLE media ADD CONSTRAINT post_category FOREIGN KEY post_category (category_id)
    REFERENCES category (id);
-- Reference:  post_user (table: media)

ALTER TABLE media ADD CONSTRAINT post_user FOREIGN KEY post_user (user_id)
    REFERENCES account (id);
-- Reference:  subscribe (table: subscription)

ALTER TABLE subscription ADD CONSTRAINT subscribe FOREIGN KEY subscribe (channel_id)
    REFERENCES account (id);
-- Reference:  subscription_user (table: subscription)

ALTER TABLE subscription ADD CONSTRAINT subscription_user FOREIGN KEY subscription_user (subscriber_id)
    REFERENCES account (id);
-- Reference:  video_post (table: video)

ALTER TABLE video ADD CONSTRAINT video_post FOREIGN KEY video_post (post_id)
    REFERENCES media (mediaid);



-- End of file.

