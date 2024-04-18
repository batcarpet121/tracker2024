<?php
require('../php/tracker_user.php');

class tracker_user_ds extends tracker_user{
    public function selectSingle($key){
        $qry = 'SELECT * FROM tracker_user WHERE tracker_user.isbn = ?';
        $stmt = $this->conn->prepare($qry);
        $stmt->bind_param('s', $key);
        $stmt->execute();
        $stmt->bind_result(
            $this->user_id, 
            $this->role_id, 
            $this->username, 
            $this->PASSWORD);

        $row = array();
        while ($stmt->fetch()) {
            array_push($row, $this->user_id);
            array_push($row, $this->role_id);
            array_push($row, $this->username);
            array_push($row, $this->PASSWORD);
        }
        if (!empty($row)) {
            return $row;
        } else {
            return null;
        }
    }

    public function selectAll($sel_list){
        if ($sel_list == null) {
            $sel_list = '*';
        } else {
            ;
        }

        $qry = 'SELECT '. $sel_list.' FROM tracker_user';
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result(
            $this->user_id, 
            $this->role_id, 
            $this->username, 
            $this->PASSWORD);

        $returnSet = array();
        $rowCount = 0;
        while ($stmt->fetch()) {
            $row = array();

            array_push($row, $this->user_id);
            array_push($row, $this->role_id);
            array_push($row, $this->username);
            array_push($row, $this->PASSWORD);

            $rowCount++;

            array_push($returnSet, $row);
        }
        if ($rowCount > 0) {
            return $returnSet;
        } else {
            return null;
        }
    }

    public function insert($values) {
        $qry = 'INSERT INTO tracker_user (user_id, role_id, username, PASSWORD) VALUES (?, ?, ?, ?)';
        $stmt = $this->conn->prepare($qry);
        $stmt->bind_param('iiss', $values['user_id'], $values['role_id'], $values['username'], $values['PASSWORD']);
        return $stmt->execute();
    }

    public function update($value, $field, $id) {
        $qry = 'UPDATE tracker_user SET ' . $field . ' = ? WHERE user_id = ?';
        $stmt = $this->conn->prepare($qry);
        $stmt->bind_param('si', $value, $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $qry = 'DELETE FROM tracker_user WHERE user_id = ?';
        $stmt = $this->conn->prepare($qry);
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
}
