<?php
require_once '../koneksi.php';
require_once 'header.php';


$action = isset($_POST['action']) ? $_POST['action'] : "";
if($action=='create') {
    $id_produk = $mysqli->real_escape_string($_POST['id_produk']);
    $nama_produk = $mysqli->real_escape_string($_POST['nama_produk']);
    $harga = $mysqli->real_escape_string($_POST['harga']);
    // $gambar = $mysqli->real_escape_string($_POST['gambar']);
   
    
    $fileExistsFlag = 0; 
    $fileName = $_FILES['Filename']['name'];
    // $link = mysqli_connect("localhost","root","","fileupload") or die("Error ".mysqli_error($link));
    /* 
    *   Checking whether the file already exists in the destination folder 
    */
    $query = "SELECT gambar_produk FROM tb_products WHERE gambar_produk='$fileName'";    
    $result = $mysqli->query($query) or die("Error : ".mysqli_error($mysqli));
    while($row = mysqli_fetch_array($result)) {
        if($row['gambar_produk'] == $fileName) {
            $fileExistsFlag = 1;
        }       
    }
    /*
    *   If file is not present in the destination folder
    */
    if($fileExistsFlag == 0) { 
        $target = "../img/product/";        
        $fileTarget = $target.$fileName;    
        $tempFileName = $_FILES["Filename"]["tmp_name"];
        // $fileDescription = $_POST['Description'];    
        $result = move_uploaded_file($tempFileName,$fileTarget);
        /*
        *   If file was successfully uploaded in the destination folder
        */
        if($result) { 
            echo "Your file <html><b><i>".$fileName."</i></b></html> has been successfully uploaded";       
            $query = "INSERT INTO tb_products(id,nama_produk,harga_produk,gambar_produk) VALUES ('$id_produk','$nama_produk','$harga','$fileName')";
            $mysqli->query($query) or die("Error : ".mysqli_error($mysqli));          
        }
        else {          
            echo "Sorry !!! There was an error in uploading your file";         
        }
        // mysqli_close($link);
    }
    /*
    *   If file is already present in the destination folder
    */
    else {
        echo "File <html><b><i>".$fileName."</i></b></html> already exists in your folder. Please rename the file and try again.";
        // mysqli_close($link);
    }   
}  