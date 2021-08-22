<?php 
/**
 * This model for managing data ruangan 
 */
class RuanganModel extends CI_Model
{
	
	public function showData()
	{
		return $this->db->get('ruangan')->result();
	}

	public function saveData($data)
	{
		return $this->db->insert('ruangan',$data);
	}

	public function editData($id)
	{
		return $this->db->get_where('ruangan',['id_ruangan' => $id])->row();
	}

	public function updateData($data,$id)
	{
		$this->db->set($data);
		$this->db->where('id_ruangan',$id);
		return $this->db->update('ruangan');
	}

	public function deleteData($id)
	{
		return $this->db->delete('ruangan',['id_ruangan' => $id]);
	}

}