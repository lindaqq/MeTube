-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2016-02-17 03:52:48.426



-- foreign keys
ALTER TABLE audio DROP FOREIGN KEY audio_post;
ALTER TABLE comment DROP FOREIGN KEY comment_post;
ALTER TABLE comment DROP FOREIGN KEY comment_user;
ALTER TABLE contact DROP FOREIGN KEY contact_user;
ALTER TABLE contact DROP FOREIGN KEY contact_user1;
ALTER TABLE download DROP FOREIGN KEY download_post;
ALTER TABLE download DROP FOREIGN KEY download_user;
ALTER TABLE favorite DROP FOREIGN KEY favorite_post;
ALTER TABLE favorite DROP FOREIGN KEY favorite_user;
ALTER TABLE image DROP FOREIGN KEY image_post;
ALTER TABLE message DROP FOREIGN KEY message_user;
ALTER TABLE message DROP FOREIGN KEY message_user1;
ALTER TABLE playlistHelper DROP FOREIGN KEY playlistHelper_playlist;
ALTER TABLE playlistHelper DROP FOREIGN KEY playlistHelper_post;
ALTER TABLE playlist DROP FOREIGN KEY playlist_user;
ALTER TABLE media DROP FOREIGN KEY post_category;
ALTER TABLE media DROP FOREIGN KEY post_user;
ALTER TABLE subscription DROP FOREIGN KEY subscribe;
ALTER TABLE subscription DROP FOREIGN KEY subscription_user;
ALTER TABLE video DROP FOREIGN KEY video_post;

-- tables
-- Table account
DROP TABLE account;
-- Table audio
DROP TABLE audio;
-- Table category
DROP TABLE category;
-- Table comment
DROP TABLE comment;
-- Table contact
DROP TABLE contact;
-- Table download
DROP TABLE download;
-- Table favorite
DROP TABLE favorite;
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
-- Table subscription
DROP TABLE subscription;
-- Table video
DROP TABLE video;



-- End of file.
