<?php
class Review
{
    private int $id;
    private string $message;
    private string $author;
    private int $tourOperatorId;
    private int $note;
    private string $date;

    public function __construct($id , $message, $author,$note,$date, $tourOperatorId)
    {
        $this->id = $id;
        $this->message = $message;
        $this->author = $author;
        $this->note = $note;
        $this->tourOperatorId = $tourOperatorId;
        $this->date = $date;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getMessage()
    {
        return $this->message;
    }
    public function setMessage($message)
    {
        $this->message = $message;
    }
    public function getAuthor()
    {
        return $this->author;
    }
    public function setAuthor($author)
    {
        $this->author = $author;
    }
    public function getTourOperatorId()
    {
        return $this->tourOperatorId;
    }
    public function setTourOperatorId($tourOperatorId)
    {
        $this->tourOperatorId = $tourOperatorId;
    }
    public function getNote()
    {
        return $this->note;
    }
    public function setNote($note)
    {
        $this->note = $note;
    }
    public function getDate()
    {
        return $this->date;
    }
    public function setDate($date)
    {
        $this->date = $date;
    }

}