<?php

namespace Source\Models;

use Source\Core\Connect;

class Trainer
{
    public function selectAll ()
    {
        $query = "SELECT * FROM trainers";
        $stmt = Connect::getInstance()->query($query);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $trainers = $stmt->fetchAll();
            return $trainers;
        } else {
            return false;
        }
    }

}