<?php
class Banni
{
	private $idBannit;
        private $pseudoBannit;
	private $justification;
	private $idProfile;
	
	public function getidBannit()
	{
            return $this->idBannit;
	}
		
	public function getpseudoBannit()
	{
            return $this->pseudoBannit;
	}
		
	public function getjustification()
	{
		return $this->justification;
	}
		
	public function getidProfile()
	{
		return $this->idProfile;
	}
	
	function setIdBannit($idBannit) {
            $this->idBannit = $idBannit;
        }

        function setPseudoBannit($pseudoBannit) {
            $this->pseudoBannit = $pseudoBannit;
        }

        function setJustification($justification) {
            $this->justification = $justification;
        }

        function setIdProfile($idProfile) {
            $this->idProfile = $idProfile;
        }


}
?>