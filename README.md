# MeTube

####account service  
table account (id, username, password, addr, detail) addr and detail do not need autocheck  

  basic scenes for account service  
  a. check username exist or not.  
  b. check username and password.  
  c. add username and password.  
  d. update profile(addr, detail).  
  e. get profile  
  g. update password   
  
addition:  
table subscription (id, subscriber_id, channel_id)  
  v. check (channel  subscriber) exist or not  
  e. add channel of subscriber.  
  f. remove channel of subscriber.  
  
table contact(userid1, userid2, type)  
type=3 is contact, type=1 is foe/block, type=2 is friend  
  a. retrieve friends/foes/contact of myself.  
  b. add a friend relationship to you  
  c. add a foe to you.  
  c. add a contact to you.  
  d. remove a foe/contact/friendship of you.    
  d. return the friendship type A to B  
  
####Data sharing service  
table media (mediaid, title, username, type, category, sharetype, path, detail, posttime, canDiscuss, canrate, keywords, viewcount, avgrate)  
type=1 video, type=2 audio, type=3 image,   
sharetype=0 public, sharetype=1 just friends  
category=1 sports, category=2 entainment  

  basic scenes for Data sharing service  
  --upload and download  
  g. add media with all attributes(title, username, type, catetory, detail, keywords, sharetype(blocked friends), candiscuss, canrate, )  
  f. view media   

addition:  
  share with everybody or just friends,   
  allow discussion or not,   
  allow rating or not    



####media service  
table media (mediaid, title, username, type, category, sharetype, path, detail, posttime, canDiscuss, canrate, keywords, viewcount, avgrate)  
type=1 video, type=2 audio, type=3 image,     
sharetype=0 public, sharetype=1 just friends    
category=1 sports, category=2 entainment   


  basic scenes for media service   
--view  
by category and type, by type,  
type=1 video, type=2 audio, type=3 image  

by user(subscription),    
table subscription (id, subscriber_id, channel_id)    
browseByChannel($username)  
only public media  

by user's play list,   
table playlist (id, subscriber_id, channel_id)    
showPlaylists($username)  
browseByPlaylist($playlistid)  
rmPlaylistMedia($playlistid, $mediaid)  
addPlaylistMedia($playlistid, mediaid)  

by user's favorite list,   
table favorite (id, subscriber_id, channel_id)  
browseByFavorite($username)  
rmFavoriteMedia($username, $mediaid)  
addFavoriteMedia($username, $mediaid)  

addition:  
 show by most viewed, by upload recent  
browseByViewcountAndType($type, $num)  
browseByUploadrecentAndType($type, $num)  

browseByFriendshare($username)  

   
  show attributes (title, username, category, post_time)(addition: view_count, avgrate)    

####User interaction service    
Messages  
sendMessage($sender, $receiver, $message)  
getMessages($username)  

Comments  
addComment($username, $mediaid)  
getComments($mediaid) return with username    
rmComment($commentid)  

addition:    
   c. rate media    
rateMedia($mediaid, $username)  
    
  e. group  
createGroup($groupName, detail)  
getDiscusses($groupid)  
addDiscuss($groupid, $username)  

####search service    
keyword-based search  
search($word)  

filter   
filterSearch($word, $type, $category, $posttime )  

show words of  wordcloud  
manually  

media recommendation  
with keywords and category uploadrecently  

