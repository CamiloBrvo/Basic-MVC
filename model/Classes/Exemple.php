<?php
class Exemple
{
   private $id;
   
   /**
   * __construct
   *
   * @param string $exemple
   */
   public function __construct(string $id) {
       $this->id = $id;
   }

   /**
   * getId
   *
   * @return string
   */
   public function getId(){
     return $this->id;
   }
   
   /**
   * setId
   *
   * @param string $exemple
   * @return void
   */
   public function setId($id): void{
     $this->id = $id;
   }

}
?>