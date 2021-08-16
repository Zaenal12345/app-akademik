<?php 
/**
 * This model for managing data kelas 
 */
class KelasModel extends CI_Model
{
	
	public function showData()
	{
		return $this->db->get('kelas')->result();
	}

	public function saveData($data)
	{
		return $this->db->insert('kelas',$data);
	}

	public function editData($id)
	{
		return $this->db->get_where('kelas',['id_kelas' => $id])->row();
	}

	public function updateData($data,$id)
	{
		$this->db->set($data);
		$this->db->where('id_kelas',$id);
		return $this->db->update('kelas');
	}

	public function deleteData($id)
	{
		return $this->db->delete('kelas',['id_kelas' => $id]);
	}

}