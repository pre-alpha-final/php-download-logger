<?php

Download(Translate());

function Translate()
{
  if ($_GET['id'] == "file1")
    return "file1.txt";

  if ($_GET['id'] == "file2")
    return "file2.jpg";

  if ($_GET['id'] == "file3")
    return "file3.zip";

  return "";
}

function DownloadLog($fileName)
{
  $ip = $_SERVER['REMOTE_ADDR']."\n";
  $myFile = "downloadlog.txt";
  $fh = fopen($myFile, 'a') or die("can't open file");
  fwrite($fh, date('Y-m-d H:i:s')." "."$ip"." "."$fileName"."\n\n");
  fclose($fh);
}

function Download($fileName)
{
  DownloadLog($fileName);

  if (!isSet($fileName) || "$fileName" == "")
  {
    die("File not found");
  }

  header("Content-disposition: attachment; filename=$fileName");
  header("Content-type: application/octet-stream");
  readfile("$fileName");
}

?>