<?php
 session_start();
?>
<DOCTYPE html>
<head>
<title>Test site</title>
<script src="assets/checks.js"></script>
</head>
<?php

require 'db.php';

	$db = new DB();

	$db->query('DROP TABLE if exists users');
	$db->query('CREATE TABLE users (id INTEGER PRIMARY KEY, username NVARCHAR(32), password VARCHAR(32), is_admin BOOLEAN, profile NVARCHAR(32));');
	$db->query("INSERT into users (id, username, password, is_admin, profile) values (1, 'alice', 'hello', TRUE, 'Hello, this is Alice!')");
	$db->query("INSERT into users (id, username, password, is_admin, profile) values (2, 'bob', 'hello', TRUE, 'test')");
	$db->query("INSERT into users (id, username, password, is_admin, profile) values (3, 'c', 'hello', TRUE, 'test')");

	$db->query('DROP TABLE if exists comments');
	$db->query('CREATE TABLE comments (id INTEGER PRIMARY KEY AUTOINCREMENT, who NVARCHAR(32), text VARCHAR(32));');
	$db->query("INSERT into comments (id, who, text) values (100, 'alice', 'Hello world!')");
?>

<body>
Setup done.

 <a href="./index.php">Main page</a> |
    <a href="./comments.php">Comments</a>

</body>
</html>
