<?php

namespace Source\Models;

use Source\Core\Connect;

class Plan
{
    public function selectAll ()
    {
        $query = "SELECT * FROM plans";
        $stmt = Connect::getInstance()->query($query);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $planos = $stmt->fetchAll();
            return $planos;
        } else {
            return false;
        }
    } 

        public function selectByCategories(string $categoriesName)
        {
            $query = "SELECT plans.*, categories.name as 'category_name' 
            FROM plans 
            join categories on plans.categories_id = categories.id 
            WHERE categories.name like ('{$categoriesName}')";
            $stmt = Connect::getInstance()->query($query);
            return $stmt->fetchAll();
        }

}