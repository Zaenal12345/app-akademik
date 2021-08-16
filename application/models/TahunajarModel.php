<?php 
/**
 * This model for managing data tahun ajar 
 */
class TahunajarModel extends CI_Model
{
	
	public function showData()
	{
		return $this->db->get('tahun_ajar')->result();
	}

	public function saveData($data)
	{
		return $this->db->insert('tahun_ajar',$data);
	}

	public function editData($id)
	{
		return $this->db->get_where('tahun_ajar',['id_tahun_ajar' => $id])->row();
	}

	public function updateData($data,$id)
	{
		$this->db->set($data);
		$this->db->where('id_tahun_ajar',$id);
		return $this->db->update('tahun_ajar');
	}

	public function deleteData($id)
	{
		return $this->db->delete('tahun_ajar',['id_tahun_ajar' => $id]);
	}

}