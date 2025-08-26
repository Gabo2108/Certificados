<?php
$filename = $_FILES['files']['name'][0];
$tmp_name = $_FILES['files']['tmp_name'][0];
if (file_exists('C://xampp/htdocs/light/assets/images/'.$filename)) {
    unlink('C://xampp/htdocs/light/assets/images/'.$filename);
}else{
move_uploaded_file($tmp_name,'./assets/images/'.$filename); 
}