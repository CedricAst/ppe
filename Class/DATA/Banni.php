<?php
class Banni
{
	private $idBannit;
        private $pseudoBannit;
	private $justification;
	private $idProfile;
	
	public function getidBannit()
	{
			return $this->_idBannit;
	}
		
		public function getpseudoBannit()
	{
			return $this->_pseudoBannit;
	}
		
		public function getjustification()
	{
			return $this->_justification;
	}
		
		public function getidProfile()
	{
			return $this->_idProfile;
	}
	
		}
	function __construct($idBannit, $pseudoBannit, $justification, $idProfile) {
            $this->idBannit = $idBannit;
            $this->pseudoBannit = $pseudoBannit;
            $this->justification = $justification;
            $this->idProfile = $idProfile;
        }

	
}
?>