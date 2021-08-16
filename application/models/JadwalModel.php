<?php
/**
 * This model for managing data jadwal 
 */
class JadwalModel extends CI_Model
{
	public function showData()
	{
		return $this->db->get('jadwal')->result();
	}
	
	public function saveData($data)
	{
		return $this->db->insert('jadwal',$data);
	}

	public function saveMultipleData($data)
	{
		return $this->db->insert_batch('jadwal',$data);
	}

	public function editData($id)
	{
		return $this->db->get_where('jadwal',['id_jadwal' => $id])->row();
	}

	public function updateData($data,$id)
	{
		$this->db->set($data);
		$this->db->where('id_jadwal',$id);
		return $this->db->update('jadwal');
	}

	public function deleteData($id)
	{
		return $this->db->delete('jadwal', ['id_jadwal' => $id]); 
	}

}