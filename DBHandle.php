<?php
include_once 'Entities.php';
use Entities\GalleryImage;


class GalleryDBConfig
{
    static $server_name = "ronsgallery-db.my.phpcloud.com";
    static $db_name = "ronsgallery";
    static $db_username = "ronsgallery";
    static $db_password = "Nevelot";
    static $port = 3306;
}

interface IGalleryDDAO
{
    function getImages();
}


class GalleryDAO implements IGalleryDDAO
{
    private static $instance;
    private $connection;

    public function __construct()
    {
        $this->connection = new mysqli(GalleryDBConfig::$server_name,GalleryDBConfig::$db_username,GalleryDBConfig::$db_password,GalleryDBConfig::$db_name);
    }

    public function __destruct()
    {
        $this->connection->close();
    }

    static function getInstance()
    {
        if(GalleryDAO::$instance==null)
        {
            GalleryDAO::$instance = new GalleryDAO();
        }
        return GalleryDAO::$instance;
    }

    function getImages()
    {
        $result = $this->connection->query("SELECT * FROM images");
        if($result==FALSE)
        {
            throw new Exception("the select query failed");
        }

        $imagesArray = array();
        while(list($id,$name) = $result->fetch_row())
        {
            array_push($imagesArray,new GalleryImage($id,$name));
        }

        return $imagesArray;
    }



}

?>
