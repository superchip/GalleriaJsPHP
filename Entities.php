<?php
/**
 * Created by ron.
 * User: admin
 * Date: 7/12/13
 * Time: 11:41 PM
 */
namespace Entities
{
    class Artist
    {
        private $id;
        private $name;

        public function __construct($idVal,$nameVal)
        {
            $this->id = $idVal;
            $this->name = $nameVal;
        }

    }

    class GalleryImage
    {
        private $id;
        private $name;

        public function __construct($idVal,$nameVal)
        {
            $this->id = $idVal;
            $this->name = $nameVal;
        }

        public function getName()
        {
            return $this->name;
        }
    }
}



?>