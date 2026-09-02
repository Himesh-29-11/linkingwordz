<?php
$key=$_GET["key"]??""; if($key!=="lw-import-2026"){http_response_code(403);echo "Forbidden";exit;}
header("Content-Type: text/plain");
$root=dirname(__DIR__);
$env=[]; foreach(file($root."/.env", FILE_IGNORE_NEW_LINES|FILE_SKIP_EMPTY_LINES) as $line){$line=trim($line); if($line===""||str_starts_with($line,"#")||!str_contains($line,"="))continue; [$k,$v]=explode("=",$line,2); $v=trim($v); if((str_starts_with($v,"\"")&&str_ends_with($v,"\""))||(str_starts_with($v,"'")&&str_ends_with($v,"'")))$v=substr($v,1,-1); $env[trim($k)]=$v;}
$pdo=new PDO("mysql:host=".($env["DB_HOST"]??"127.0.0.1").";port=".($env["DB_PORT"]??"3306").";dbname=".$env["DB_DATABASE"].";charset=utf8mb4",$env["DB_USERNAME"],$env["DB_PASSWORD"],[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
$sql=file_get_contents($root."/posts-only.sql");
if($sql===false||trim($sql)===""){echo "missing posts-only.sql\n"; exit;}
$pdo->exec("SET FOREIGN_KEY_CHECKS=0");
$parts=preg_split("/;\s*\n/",$sql); $ok=0;$fail=0;
foreach($parts as $p){$p=trim($p); if($p===""||str_starts_with($p,"--")||str_starts_with($p,"SET "))continue; try{$pdo->exec($p);$ok++;}catch(Throwable $i){$fail++; echo "FAIL: ".$i->getMessage()."\n";}}
$pdo->exec("SET FOREIGN_KEY_CHECKS=1");
$n=(int)$pdo->query("SELECT COUNT(*) FROM posts")->fetchColumn();
echo "ok=$ok fail=$fail posts=$n\n";