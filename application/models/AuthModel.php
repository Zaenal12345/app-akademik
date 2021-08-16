<?php

class AuthModel extends CI_Model{

    public function showData(){
        return $this->db->get('users')->result();
    }

    public function saveData($data){
        return $this->db->insert('users',$data);
    }

    public function editData($id){
        return $this->db->get_where('users',['id'=> $id])->row();
    }

    public function updateData($data,$id){
        $this->db->set($data);
        $this->db->where('id',$id);
        return $this->db->update('users');
    }

    public function deleteData($id){
        return $this->db->delete('users',['id'=>$id]);
    }

    public function getDataByUsername($username){
        return $this->db->where(['username' => $username])->get('users')->row();
    }

}