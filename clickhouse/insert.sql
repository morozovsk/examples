INSERT INTO db.table (c1, c2, c3) VALUES (v11, v12, v13);
INSERT INTO db.table VALUES (v11, v12, v13);

INSERT INTO pinba.requests ( hostname , schema , status ) VALUES ('1','2',3);
INSERT INTO pinba.requests ( hostname , schema , status ) VALUES ('1','2',3), ('2','2',4);
INSERT INTO queries VALUES ('2017-08-17',5,'SELECT foo FROM bar WHERE id=?',['1220','1230','1212'],[5,6,2]);
INSERT INTO table_name (primaryKey, nested1, nested2) format Values VALUES (123, ['qwerty','asdf'], [456, 567]), (234, ['asdfg','zxcv'], [345,678]);
INSERT INTO table_name (primaryKey, nested1.a, nested1.b) format Values VALUES (123, 'qwerty', [456, 567]), (234, 'asdfg', [345,678]);
