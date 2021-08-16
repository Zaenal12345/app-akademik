<?php
/**
 * This model for managing data dosen
 */
class DosenModel extends CI_Model
{
	
	public function showData()
	{
		return $this->db->get('dosen')->result();
	}

	public function saveData($data)
	{
		return $this->db->insert('dosen',$data);
	}

	public function editData($id)
	{
		return $this->db->get_where('dosen',['id_dosen' => $id])->row();
	}

	public function updateData($data,$id)
	{
		$this->db->set($data);
		$this->db->where('id_dosen',$id);
		return $this->db->update('dosen');
	}

	public function deleteData($id)
	{
		return $this->db->delete('dosen',['id_dosen' => $id]);
	}
}