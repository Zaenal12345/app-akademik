<?php
class Wsfeeder
{
     private $url='http://45.118.112.106:8082/ws/sandbox2.php';
     private $token;
     private $mCi;
     private $user='041031';
     private $pass='dakota8abdg';
     private $args;

	// function __construct()
	// {
  //     $this->url = $url;      
  //     $this->user = $user;
  //     $this->pass = $pass; 
  //     $this->error = '';
      
	// }

  public function login()
  {
     $hsl = $this->GetToken($this->user,$this->pass);     
     $tmp = false;
     if($hsl->error_code==0){
        $this->token = $hsl->data->token;        
        // $this->token = $hsl->data->token;        
        $tmp = true;
     }
     return $hsl;
  } 

	private function GetToken($user='',$pass='')	//function untuk ngambil token
	{        
         $hsl=$this->runws(array('act'=>'GetToken','username'=>$user,'password'=>$pass));
         $hsl=json_decode($hsl);
         $this->token = $hsl->data->token;
         return $hsl;
	}

 public function cek_hsl($hsl)
  {    
         
    $tmp='';
      if($hsl->error_code==0){        
            $tmp= $hsl->data;
        }else{
          switch ($hsl->error_code) {
            case  100: //kalau erro code 100 token expire
                  $islogin=$this->login();
                  if($islogin){
                   $this->args['token']=$this->token;
                   $hsl=$this->runws($this->args);
                   $hsl=json_decode($hsl);                     
                   $tmp=$this->cek_hsl($hsl);          
                 }  
              break;    
            default:
              $tmp='error code = '.$hsl->error_code.';error msg = '.$hsl->error_desc;
              break;
          }
           
        }
      
      return $tmp;
  }

  	//magic function 
	function __call($name,$arguments)
	{
      
      $arguments[0]['act']=$name;
      $arguments[0]['token']=$this->token;
            
          $this->args = $arguments[0];
          $hsl=$this->runws($this->args);                
          $hsl=json_decode($hsl);                   
         return $this->cek_hsl($hsl);      
	}

	
	//function untuk konek ke webservice
	private function runws($data,$type='json')
	{
		$ch = curl_init();

		curl_setopt($ch,CURLOPT_POST,1);
	    
	    $headers = array();
	    if ($type=='xml')
	       $headers[]= 'Content-Type: application/xml';
	    else	
		   $headers[]= 'Content-Type: application/json';

		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		if($data){
			if($type=='xml'){
				$data = $this->stringXML($data);
			}
		    else{
		    	$data = json_encode($data);
		    }
		    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		}
	    curl_setopt($ch, CURLOPT_URL, $this->url);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    $result = curl_exec($ch);
	    curl_close($ch);      
	    //var_dump($result);
		return $result;

	}

	private function stringXML($data){
		$xml = new SimpleXMLElement('<?xml version="1.0"><data></data>');
	    $this->array_to_xml($data,$xml);
	    return $xml->asXML();
	}

	private function array_to_xml($data,&$xml_data){
	   foreach ($data as $key => $value) {
	   	   if(is_array($value)){
	          $subnode = $xml_data->addChild($key);
	          array_to_xml($value,$subnode);  
	   	   }else{
	   	   	 $xml_data->addChild("$key",$value);
	   	   }
	   }
	}

  public function getAllMahasiswa(){
      $this->login();
      $hsl=$this->runws(array('act'=>'GetListMahasiswa','token'=>$this->token));
      $hsl=json_decode($hsl);
      return $hsl;
  }

  public function getMahasiswaAktif()
  {
      $this->login();
      $hsl=$this->runws(array('act'=>'GetListMahasiswa','token'=>$this->token, 'filter' => " nama_status_mahasiswa = 'Aktif'"));
      $hsl=json_decode($hsl);
      return $hsl;
  }

  public function getMahasiswaLulus()
  {
      $this->login();
      $hsl=$this->runws(array('act'=>'GetListMahasiswa','token'=>$this->token, 'filter' => "nama_status_mahasiswa = 'Lulus'" ));
      $hsl=json_decode($hsl);
      return $hsl;
  }

  public function getMahasiswaKeluar1()
  {
      $this->login();
      $hsl=$this->runws(array('act'=>'GetListMahasiswa','token'=>$this->token, 'filter' => "nama_status_mahasiswa = 'Mengundurkan diri'" ));
      $hsl=json_decode($hsl);
      return $hsl;
  }

  public function getMahasiswaKeluar2()
  {
      $this->login();
      $hsl=$this->runws(array('act'=>'GetListMahasiswa','token'=>$this->token, 'filter' => "nama_status_mahasiswa = 'Dikeluarkan'" ));
      $hsl=json_decode($hsl);
      return $hsl;
  }

  public function getMahasiswaCuti()
  {
      $this->login();
      $hsl=$this->runws(array('act'=>'GetListMahasiswa','token'=>$this->token, 'filter' => "nama_status_mahasiswa = 'Cuti'" ));
      $hsl=json_decode($hsl);
      return $hsl;
  }
  

}

?>