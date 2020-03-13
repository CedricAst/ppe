<?php
class Sujet
{
	private $idSujet;
	private $nomSujet;
	private $likeSujet;
	private $dislikeSujet;
	private $text;
	private $URL;
        private $idProfile;    
        function getIdSujet() {
        return $this->idSujet;
    }

    function getNomSujet() {
        return $this->nomSujet;
    }

    function getLikeSujet() {
        return $this->likeSujet;
    }

    function getDislikeSujet() {
        return $this->dislikeSujet;
    }

    function getText() {
        return $this->text;
    }

    function getURL() {
        return $this->URL;
    }

    function getIdProfile() {
        return $this->idProfile;
    }

    function setIdSujet($idSujet) {
        $this->idSujet = $idSujet;
    }

    function setNomSujet($nomSujet) {
        $this->nomSujet = $nomSujet;
    }

    function setLikeSujet($likeSujet) {
        $this->likeSujet = $likeSujet;
    }

    function setDislikeSujet($dislikeSujet) {
        $this->dislikeSujet = $dislikeSujet;
    }

    function setText($text) {
        $this->text = $text;
    }

    function setURL($URL) {
        $this->URL = $URL;
    }

    function setIdProfile($idProfile) {
        $this->idProfile = $idProfile;
    }
}
?>