<?php

class TestManager extends Manager
{
    /**
     * getList
     *
     * @return array
     */
    public function getList()
    {
        $result = array();
        try {
            $cnx = $this->getPDO();
            $req = $cnx->prepare("SELECT * FROM exemple");
            $req->execute();

            $line = $req->fetch(PDO::FETCH_ASSOC);
            while ($line) {
                $exemple = new Exemple(
                    $line['id']
                );
                array_push($result, $exemple);
                $line = $req->fetch(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            print "Error !: " . $e->getMessage();
            die();
        }
        return $result;
    }

    /**
     * get
     *
     * @return Exemple
     */
    public function get($id)
    {
        try {
            $cnx = $this->getPDO();
            $req = $cnx->prepare("SELECT * FROM exemple WHERE id = :id");
            $req->bindValue(':id', $id, PDO::PARAM_INT);
            $req->execute();

            $line = $req->fetch(PDO::FETCH_ASSOC);
            $exemple = new Exemple(
                $line['id']
            );
        } catch (PDOException $e) {
            print "Error !: " . $e->getMessage();
            die();
        }
        return $exemple;
    }

    /**
     * set
     *
     * @return void
     */
    public function set(Exemple $exemple)
    {
        try{
            $cnx = $this->getPDO();
            $req = $cnx->prepare('INSERT INTO exemple (id, libelle) VALUES (:id, :libelle)');
            $req->bindValue(':id', $exemple->getId(), PDO::PARAM_INT);
            $req->bindValue(':libelle', $exemple->getLibelle(), PDO::PARAM_STR);
            $req->execute();
        } catch (PDOException $e) {
            print "Error !: " . $e->getMessage();
            die();
        }
    }

    /**
     * update
     *
     * @return void
     */
    public function update(Exemple $exemple)
    {
        try{
            $cnx = $this->getPDO();
            $req = $cnx->prepare('UPDATE exemple SET id = :id, libelle = :libelle WHERE id = :id');
            $req->bindValue(':id', $exemple->getId(), PDO::PARAM_STR);
            $req->bindValue(':libelle', $exemple->getLibelle(), PDO::PARAM_STR);
            $req->execute();
        } catch (PDOException $e) {
            print "Error !: " . $e->getMessage();
            die();
        }
    }


    /**
     * delete
     *
     * @return void
     */
    public function delete(Exemple $exemple){
        try{
            $cnx = $this->getPDO();
            $req = $cnx->prepare('DELETE FROM exemple WHERE id = :id');
            $req->bindValue(':id', $exemple->getId(), PDO::PARAM_STR);
            $req->execute();
        } catch (PDOException $e) {
            print "Error !: " . $e->getMessage();
            die();
        }
    }

}

?>