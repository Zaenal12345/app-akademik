<?php
/**
 * This model for managing data jurusan 
 */
class JurusanModel extends CI_Model
{
	public function showData()
	{
		return $this->db->get('jurusan')->result();
	}
	
	public function saveData($data)
	{
		return $this->db->insert('jurusan',$data);
	}

	public function editData($id)
	{
		return $this->db->get_where('jurusan',['id_jurusan' => $id])->row();
	}

	public function updateData($data,$id)
	{
		$this->db->set($data);
		$this->db->where('id_jurusan',$id);
		return $this->db->update('jurusan');
	}

	public function deleteData($id)
	{
		return $this->db->delete('jurusan', ['id_jurusan' => $id]); 
	}

}