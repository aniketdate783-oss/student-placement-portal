<?php
if(session_status()===PHP_SESSION_NONE)session_start(); require_once __DIR__.'/database.php';
function e($x){return htmlspecialchars((string)$x,ENT_QUOTES,'UTF-8');} function go($u){header("Location: $u");exit;}
function csrf(){if(empty($_SESSION['csrf']))$_SESSION['csrf']=bin2hex(random_bytes(32));return $_SESSION['csrf'];} function check_csrf(){if($_SERVER['REQUEST_METHOD']==='POST'&&!hash_equals($_SESSION['csrf']??'',$_POST['csrf']??''))die('Invalid request token.');}
function login_required($role){if(empty($_SESSION['user_id'])||($_SESSION['role']??'')!==$role)go('../login.php');} function flash($m,$t='success'){$_SESSION['flash']=[$m,$t];} function flashes(){if(isset($_SESSION['flash'])){$f=$_SESSION['flash'];unset($_SESSION['flash']);echo '<div class="flash '.$f[1].'">'.e($f[0]).'</div>';}}
function notify($uid,$title,$msg){global $pdo;$q=$pdo->prepare('INSERT INTO notifications(user_id,title,message) VALUES(?,?,?)');$q->execute([$uid,$title,$msg]);}
function upload($field,$folder,$exts=['jpg','jpeg','png','webp','pdf','doc','docx']){if(empty($_FILES[$field]['name'])||$_FILES[$field]['error']!==UPLOAD_ERR_OK||$_FILES[$field]['size']>5242880)return null;$ext=strtolower(pathinfo($_FILES[$field]['name'],PATHINFO_EXTENSION));if(!in_array($ext,$exts,true))return null;$name=bin2hex(random_bytes(10)).'.'.$ext;$dir=__DIR__.'/../assets/uploads/'.$folder;if(!is_dir($dir))mkdir($dir,0755,true);if(move_uploaded_file($_FILES[$field]['tmp_name'],$dir.'/'.$name))return 'assets/uploads/'.$folder.'/'.$name;return null;}
?>
