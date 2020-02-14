<?php
class Utilisateur
{
    private $idProfile;
    private $pseudo;
    private $MDP;
    private $grade;
    private $URLimageProfile;
	
	public function getidProfile()
	{
			return $this->_idProfile;
	}
	public function getpseudo()
	{
			return $this->_pseudo;
	}
	public function getMDP()
	{
			return $this->_MDP;
	}
	public function getgrade()
	{
			return $this->_grade;
	}
	public function getURLimageProfile()
	{
			return $this->_URLimageProfile;
	}
	
	
	
	
	public function setidProfile($idProfile)
	{
		$this->_idProfile= $idProfile;
	}
		
	public function setpseudo($pseudo)
	{
		$this->_pseudo= $pseudo;
	}
	
	public function setMDP($idProfile)
	{
		$this->_MDP= $MDP;
	}
		
	public function setgrade($grade)
	{
		$this->_grade= $grade;
	}
	
	public function setURLimageProfile($URLimageProfile)
	{
		$this->_URLimageProfile= $URLimageProfile;
	}
	
	        function __construct($idProfile, $pseudo, $MDP, $grade, $URLimageProfile) {
            $this->idProfile = $idProfile;
            $this->pseudo = $pseudo;
            $this->MDP = $MDP;
            $this->grade = $grade;
            $this->URLimageProfile = $URLimageProfile;
        }

}
?>