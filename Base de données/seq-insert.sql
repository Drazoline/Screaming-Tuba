ALTER TABLE users AUTO_INCREMENT = 0;
ALTER TABLE permissions AUTO_INCREMENT = 0;
ALTER TABLE subscriptions AUTO_INCREMENT = 0;
ALTER TABLE files AUTO_INCREMENT = 0;
ALTER TABLE groups AUTO_INCREMENT = 0;
ALTER TABLE folders AUTO_INCREMENT = 0;
ALTER TABLE user_file_likes AUTO_INCREMENT = 0;
ALTER TABLE group_users AUTO_INCREMENT = 0;
ALTER TABLE perm_group_users AUTO_INCREMENT = 0;
ALTER TABLE folder_owners AUTO_INCREMENT = 0;
ALTER TABLE folder_files AUTO_INCREMENT = 0;
ALTER TABLE comments AUTO_INCREMENT = 0;

/** Users **/
INSERT INTO USERS VALUES (null, 'MarcLabrecheFangirl', 'password', 'marclabrechefangirl@gmail.com', null, 0);
INSERT INTO USERS VALUES (users_seq.NEXTVAL, 'ApacheHelicopter', 'password', 'apacheHelicopter@gmail.com', null, 0);
INSERT INTO USERS VALUES (users_seq.NEXTVAL, 'Drazoline', 'password', 'drazoline@gmail.com', null, 0);
INSERT INTO USERS VALUES (users_seq.NEXTVAL, 'Utahime', 'password', 'utahime@gmail.com', null, 0);
INSERT INTO USERS VALUES (users_seq.NEXTVAL, 'Dominaterxrv21', 'password', 'dominaterxrv21@gmail.com', null, 0);

/** Permissions **/
INSERT INTO PERMISSIONS VALUES (permissions_seq.NEXTVAL, 'Owner');
INSERT INTO PERMISSIONS VALUES (permissions_seq.NEXTVAL, 'Download');
INSERT INTO PERMISSIONS VALUES (permissions_seq.NEXTVAL, 'Upload/Download');

/** Subscriptions **/
INSERT INTO SUBSCRIPTIONS VALUES (subscriptions_seq.NEXTVAL, 3, 2);

/** Files **/
INSERT INTO Files VALUES (files_seq.NEXTVAL, null, 100, 1, sysdate, 'PUBLIC');
INSERT INTO Files VALUES (files_seq.NEXTVAL, null, 50, 3, sysdate, 'PRIVATE');
INSERT INTO Files VALUES (files_seq.NEXTVAL, null, 312, 5, sysdate, 'GROUP');

/** Groups **/
INSERT INTO Groups VALUES (groups_seq.NEXTVAL, 1, 'Baba', 1);
INSERT INTO Groups VALUES (groups_seq.NEXTVAL, 3, 'Tartampion', 4);

/** Folders **/
INSERT INTO Folders VALUES (folders_seq.NEXTVAL, 'Test', sysdate);
INSERT INTO Folders VALUES (folders_seq.NEXTVAL, 'Dossier', sysdate);

/** User_file_likes **/
INSERT INTO User_file_likes VALUES (user_file_likes_seq.NEXTVAL, 2, 3);
INSERT INTO User_file_likes VALUES (user_file_likes_seq.NEXTVAL, 1, 4);
INSERT INTO User_file_likes VALUES (user_file_likes_seq.NEXTVAL, 3, 2);

/** Group_users **/
INSERT INTO Group_users VALUES (group_users_seq.NEXTVAL, 1, 1);
INSERT INTO Group_users VALUES (group_users_seq.NEXTVAL, 2, 5);

/** Perm_group_users **/
INSERT INTO perm_group_users VALUES (perm_group_users_seq.NEXTVAL, 1, 1);
INSERT INTO perm_group_users VALUES (perm_group_users_seq.NEXTVAL, 3, 2);

/** Folder_owners **/
INSERT INTO folder_owners VALUES (folder_owners_seq.NEXTVAL, 1, 1, 1);
INSERT INTO folder_owners VALUES (folder_owners_seq.NEXTVAL, 2, 4, 2);

/** Folder_files **/
INSERT INTO Folder_files VALUES (folder_files_seq.NEXTVAL, 1, 1, SYSDATE, 'Titre');
INSERT INTO Folder_files VALUES (folder_files_seq.NEXTVAL, 2, 2, SYSDATE, 'Titre2');

/** Comments **/
INSERT INTO Comments VALUES (comments_seq.NEXTVAL, 'Blabla', sysdate, 1, 3);
INSERT INTO Comments VALUES (comments_seq.NEXTVAL, 'Hello', sysdate, 2, 4);