# MeTube

####account service  
table account (id, username, password, addr, detail) addr and detail do not need autocheck

  basic scenes for account service  
  a. check username exist or not.  
  b. check username and password.  
  c. add username and password.  
  d. update profile(addr, detail).  
  g. update password  
  
addition:  
table subscription (id, subscriber_id, channel_id)  
  v. check channel of subscriber exist or not
  e. add channel of subscriber.  
  f. remove channel of subscriber.  
  
table (userid1, userid2, type) type=0 is contact, type=1 is foe/block, type=2 is friend  
  a. retrieve friends of myself.  
  g. retrieve foes of myself.  
  f. retrieve contact of myself
  b. add a friend relationship to you
  c. add a foe to you.  
  c. add a contact to you.  
  d. remove a foe/contact/friendship of you.
  d. return the friendship type A to B
  
####Data sharing service  
table media (mediaid, title, user_id, mediatype, category, sharetype, block, path, detail, post_time, canDiscuss, canrating, tags, view_count, avgrate)  
type=1 video, type=2 audio, type=3 image,   
sharetype=0 public, sharetype=1 just friends  
blocktype=0 no block, blocktype=1 has block  

  basic scenes for Data sharing service  
  --upload and download  
  g. add media with all attributes(title detail keywords)
  h. download media by anyone 
  f. view media by anyone

addition:  
  share with everybody or just friends, 
  allow discussion or not, 
  allow rating or not  
  select block users
  remove block users


####media service  
table media (mediaid, title, user_id, mediatype, category, blocktype, path, detail, post_time, canDiscuss, canrating, tags, view_count, avgrate)  


  basic scenes for media service   
--view(without blocked ones and with unblocked ones)  
by category and type, by type,  
type=1 video, type=2 audio, type=3 image,   

by user(subscription),  
table subscription (id, subscriber_id, channel_id)  

by user's play list, 
table playlist (id, subscriber_id, channel_id)  

by user's favorite list, 
table playlist (id, subscriber_id, channel_id)  


addition:
 show by most viewed, by upload recent  
   f. media's view++  
   c. rate media  
   
  show attributes (title, username, category, post_time)(addition: view_count, avgrate)  

####User interaction service  

addition:  
view_count, comment, rate
  b. detail show(title, username, post_time, view_count, avgrate, path, detail, comment)  
  d. add comment  
  e. remove comment of owner  

####search service  
by recommend of one post(todo), by filter(todo), by tags(todo with wordcloud)  
