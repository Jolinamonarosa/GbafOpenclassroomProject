<?php
include_once 'database.php';
class Vote {
    private $bdd;

    public function __construct(PDO $bdd) {
        $this->pdo =$bdd;
    }

    private function recordExists($ref_id, $ref) {
        $req = $this->pdo->prepare("SELECT * FROM $ref WHERE id=?");
        $req->execute(array($ref_id));
        if($req->rowCount() == 0) {
            throw new Exception('Impossible de voter');
        }
    }

    public function like($ref_id, $ref, $user_id) {
     return $this->vote($ref_id, $ref, $user_id, 1);
    }

    public function dislike($ref, $ref_id, $user_id) {
       return $this->vote($ref, $ref_id, $user_id, -1);

    }

    private function vote($ref_id, $ref, $user_id, $vote) {
        $this->recordExists($ref_id, $ref);
        $req = $this->pdo->prepare('SELECT id, vote FROM votes WHERE ref_id=? AND ref=? AND user_id=?');
        $req->execute($ref_id, $ref, $user_id);
        $vote_row = $req->fetch();
        if($vote_row) {
            if($vote_row->vote == $vote) {
                return true;
            }
            $this->pdo->prepare('UPDATE votes SET = ?, created-at = ? WHERE id = {$vote_row->id}')->execute([$vote, date('Y-m-d- H:i:s')]);
            return true;
        }
        $req = $this->pdo->prepare('INSERT INTO votes SET ref_id=?, ref=?, user_id=?, created_at=?, vote = $vote');
        $req->execute([$ref_id, $ref, $user_id, date('Y-m-d- H:i:s')]);
        return true;
    }
}