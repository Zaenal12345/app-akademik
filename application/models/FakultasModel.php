<?php

/**
 * This model for managing data fakultas 
 */
class FakultasModel extends CI_Model
{
	public function saveData($data)
	{
		return $this->db->insert('fakultas',$data);
	}

	public function editData($id)
	{
		return $this->db->get_where('fakultas',['id_fakultas' => $id])->row();
	}

	public function updateData($data,$id)
	{
		$this->db->set($data);
		$this->db->where('id_fakultas',$id);
		return $this->db->update('fakultas');
	}

	public function deleteData($id)
	{
		return $this->db->delete('fakultas', ['id_fakultas' => $id]); 
	}

}