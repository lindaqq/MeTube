-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2016-03-28 04:09:07.218



-- foreign keys
ALTER TABLE audio DROP FOREIGN KEY audio_post;
ALTER TABLE block DROP FOREIGN KEY block_account;
ALTER TABLE block DROP FOREIGN KEY block_media;
ALTER TABLE comment DROP FOREIGN KEY comment_post;
ALTER TABLE comment DROP FOREIGN KEY comment_user;
ALTER TABLE contact DROP FOREIGN KEY contact_user;
ALTER TABLE contact DROP FOREIGN KEY contact_user1;
ALTER TABLE favorite DROP FOREIGN KEY favorite_post;
ALTER TABLE favorite DROP FOREIGN KEY favorite_user;
ALTER TABLE `group` DROP FOREIGN KEY group_account;
ALTER TABLE image DROP FOREIGN KEY image_post;
ALTER TABLE playlistHelper DROP FOREIGN KEY playlistHelper_playlist;
ALTER TABLE playlistHelper DROP FOREIGN KEY playlistHelper_post;
ALTER TABLE playlist DROP FOREIGN KEY playlist_user;
ALTER TABLE media DROP FOREIGN KEY post_user;
ALTER TABLE rate DROP FOREIGN KEY rate_account;
ALTER TABLE rate DROP FOREIGN KEY rate_media;
ALTER TABLE subscription DROP FOREIGN KEY subscribe;
ALTER TABLE subscription DROP FOREIGN KEY subscription_user;
ALTER TABLE unblock DROP FOREIGN KEY unblock_account;
ALTER TABLE unblock DROP FOREIGN KEY unblock_media;
ALTER TABLE video DROP FOREIGN KEY video_post;

-- tables
-- Table account
DROP TABLE account;
-- Table audio
DROP TABLE audio;
-- Table block
DROP TABLE block;
-- Table comment
DROP TABLE comment;
-- Table contact
DROP TABLE contact;
-- Table favorite
DROP TABLE favorite;
-- Table `group`
DROP TABLE `group`;
-- Table image
DROP TABLE image;
-- Table media
DROP TABLE media;
-- Table message
DROP TABLE message;
-- Table playlist
DROP TABLE playlist;
-- Table playlistHelper
DROP TABLE playlistHelper;
-- Table rate
DROP TABLE rate;
-- Table subscription
DROP TABLE subscription;
-- Table unblock
DROP TABLE unblock;
-- Table video
DROP TABLE video;



-- End of file.
