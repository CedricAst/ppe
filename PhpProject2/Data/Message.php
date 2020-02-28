<?php
class Message
{
    private $idMessage;
    private $text;
    private $likeMessage;
    private $dislikeMessage;
    private $URLimage;
    private $idSujet;
    private $idProfile;
    private $DateCreationM;
    public function getDateCreationM() {
        return $this->DateCreationM;
    }

    public function setDateCreationM($DateCreationM) {
        $this->DateCreationM = $DateCreationM;
    }

        function getIdProfile() {
        return $this->idProfile;
    }

    function setIdProfile($idProfile) {
        $this->idProfile = $idProfile;
    }

        function getIdSujet() {
        return $this->idSujet;
    }

    function setIdSujet($idSujet) {
        $this->idSujet = $idSujet;
    }

    	
    function getIdMessage() {
        return $this->idMessage;
    }

    function getText() {
        return $this->text;
    }

    function getLikeMessage() {
        return $this->likeMessage;
    }

    function getDislikeMessage() {
        return $this->dislikeMessage;
    }

    function getURLimage() {
        return $this->URLimage;
    }

    function setIdMessage($idMessage) {
        $this->idMessage = $idMessage;
    }

    function setText($text) {
        $this->text = $text;
    }

    function setLikeMessage($likeMessage) {
        $this->likeMessage = $likeMessage;
    }

    function setDislikeMessage($dislikeMessage) {
        $this->dislikeMessage = $dislikeMessage;
    }

    function setURLimage($URLimage) {
        $this->URLimage = $URLimage;
    }
}
?>