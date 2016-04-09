-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2016-04-03 15:06:33.816



-- foreign keys
ALTER TABLE comment DROP FOREIGN KEY comment_post;
ALTER TABLE comment DROP FOREIGN KEY comment_user;
ALTER TABLE contact DROP FOREIGN KEY contact_user;
ALTER TABLE contact DROP FOREIGN KEY contact_user1;
ALTER TABLE favorite DROP FOREIGN KEY favorite_post;
ALTER TABLE favorite DROP FOREIGN KEY favorite_user;
ALTER TABLE discuss DROP FOREIGN KEY groupaccount_account;
ALTER TABLE discuss DROP FOREIGN KEY groupaccount_group;
ALTER TABLE message DROP FOREIGN KEY message_contact;
ALTER TABLE playlistmedia DROP FOREIGN KEY playlistHelper_playlist;
ALTER TABLE playlistmedia DROP FOREIGN KEY playlistHelper_post;
ALTER TABLE playlist DROP FOREIGN KEY playlist_user;
ALTER TABLE media DROP FOREIGN KEY post_user;
ALTER TABLE rate DROP FOREIGN KEY rate_account;
ALTER TABLE rate DROP FOREIGN KEY rate_media;
ALTER TABLE subscription DROP FOREIGN KEY subscribe;
ALTER TABLE subscription DROP FOREIGN KEY subscription_user;
ALTER TABLE sharedfriends DROP FOREIGN KEY unblock_account;
ALTER TABLE sharedfriends DROP FOREIGN KEY unblock_media;

-- tables
-- Table account
DROP TABLE account;
-- Table comment
DROP TABLE comment;
-- Table contact
DROP TABLE contact;
-- Table discuss
DROP TABLE discuss;
-- Table favorite
DROP TABLE favorite;
-- Table `group`
DROP TABLE `group`;
-- Table media
DROP TABLE media;
-- Table message
DROP TABLE message;
-- Table playlist
DROP TABLE playlist;
-- Table playlistmedia
DROP TABLE playlistmedia;
-- Table rate
DROP TABLE rate;
-- Table sharedfriends
DROP TABLE sharedfriends;
-- Table subscription
DROP TABLE subscription;



-- End of file.
