<?php

require_once './database/Database.php';

class Message
{
    private string $title;
    private string $author;
    private string $content;
    private string $date;
    private int $idMessageTo = -1;

    private int $idEnt;

    /**
     * @param string $title
     * @param string $author
     * @param string $content
     * @param string $date
     * @param int $idMessageTo
     * @param int $idCompany
     */
    public function __construct(string $title, string $author, string $content, string $date, int $idMessageTo, int $idCompany)
    {
        $this->title = $title;
        $this->author = $author;
        $this->content = $content;
        $this->date = $date;
        $this->idMessageTo = $idMessageTo;
        $this->idEnt = $idCompany;
    }

    public static function addMessage(Message $message) : bool {

        $pdo = new Database();
        $request = $pdo->getPdoInstance()->prepare("INSERT INTO Message 
                                                ('titre', 'contenu', 'auteur', 'date', 'idMessageTo', 'idEnt')
                                                VALUES
                                                (:title, :content, :author, :date, :idMessage, :idEnt)");
        $request->bindValue(':title', $message->title);
        $request->bindValue(':content', $message->content);
        $request->bindValue(':author', $message->author);
        $request->bindValue(':date', $message->date);
        $request->bindValue(':idMessage', $message->idMessageTo);
        $request->bindValue(':idEnt', $message->idEnt);

        return $request->execute();
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return DateTime
     */
    public function getDate(): DateTime
    {
        return $this->date;
    }

    /**
     * @return int
     */
    public function getIdMessageTo(): int
    {
        return $this->idMessageTo;
    }

    /**
     * @return int
     */
    public function getIdEnt(): int
    {
        return $this->idEnt;
    }



}