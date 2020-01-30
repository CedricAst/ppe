<?php
class Messsage
{
    private $idMessage;
    private $text;
    private $likeMessage;
    private $dislikeMessage;
    private $URLimage;
	private $idSujet;
	
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