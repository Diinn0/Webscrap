<?php

include './database/Database.php';

class Action
{
    private string $date;
    private float $flow;
    private float $opening;
    private float $closing;
    private float $high_flow;
    private float $low_flow;
    private float $high_limit;
    private float $low_limit;
    private int $volume;
    private float $variation;
    private int $idCompany;

    /**
     * @param string $date
     * @param float $flow
     * @param float $opening
     * @param float $closing
     * @param float $high_flow
     * @param float $low_flow
     * @param float $high_limit
     * @param float $low_limit
     * @param int $volume
     * @param float $variation
     * @param int $idCompany
     */
    public function __construct(string $date, float $flow, float $opening, float $closing, float $high_flow, float $low_flow, float $high_limit, float $low_limit, int $volume, float $variation, int $idCompany)
    {
        $this->date = $date;
        $this->flow = $flow;
        $this->opening = $opening;
        $this->closing = $closing;
        $this->high_flow = $high_flow;
        $this->low_flow = $low_flow;
        $this->high_limit = $high_limit;
        $this->low_limit = $low_limit;
        $this->volume = $volume;
        $this->variation = $variation;
        $this->idCompany = $idCompany;
    }

    public static function addAction(Action $action) : bool {

        $pdo = new Database();
        $request = $pdo->getPdoInstance()->prepare("INSERT INTO Message 
                                                (
                                                 'date_heure', 'cours', 'ouverture_cours', 'cloture_veille', 
                                                 'cours_haut', 'cours_bas', 'limite_haut', 'limite_bas',
                                                 'volume', 'variation', 'idEntreprise'
                                                 )
                                                VALUES
                                                (
                                                 :date, :flow, :opening, :closing,
                                                 :highFlow, :lowFlow, :highLimit, :lowLimit,
                                                 :volume, :variation, :idEnt
                                                 )");

        $request->bindValue(':date', $action->date);
        $request->bindValue(':flow', $action->flow);
        $request->bindValue(':opening', $action->opening);
        $request->bindValue(':closign', $action->closing);
        $request->bindValue(':highFlow', $action->high_flow);
        $request->bindValue(':lowFlow', $action->low_flow);
        $request->bindValue(':highLimit', $action->high_limit);
        $request->bindValue(':lowLimit', $action->low_limit);
        $request->bindValue(':volume', $action->volume);
        $request->bindValue(':variation', $action->variation);
        $request->bindValue(':idEnt', $action->idCompany);

        return $request->execute();
    }

    public static function getAllActions() : array {
        $pdo = new Database();
        $request = $pdo->getPdoInstance()->prepare("SELECT * FROM Cours;");
        $request->execute();
        $result = $request->fetchAll(\PDO::FETCH_ASSOC);

        $actions = array();

        var_dump($result);

        foreach ($result as $row) {

            $flow = $row['cours'];
            $date = $row['date_heure'];
            $opening = $row['ouverture_cours'];
            $closing = $row['cloture_veille'];
            $highFlow = $row['cours_haut'];
            $lowFlow = $row['cours_bas'];
            $highLimit = $row['limite_haut'];
            $lowLimit = $row['limite_bas'];
            $volume = $row['volume'];
            $variation = $row['variation'];
            $idEntreprise = $row['idEntreprise'];

            $action = new Action(
                $date, $flow, $opening, $closing,
                $highFlow, $lowFlow, $highLimit, $lowLimit,
                $volume, $variation, $idEntreprise
            );

            $actions[] = $action;
        }

        return $actions;

    }

    /**
     * @return DateTime
     */
    public function getDate(): DateTime
    {
        return $this->date;
    }

    /**
     * @return float
     */
    public function getFlow(): float
    {
        return $this->flow;
    }

    /**
     * @return float
     */
    public function getOpening(): float
    {
        return $this->opening;
    }

    /**
     * @return float
     */
    public function getClosing(): float
    {
        return $this->closing;
    }

    /**
     * @return float
     */
    public function getHighFlow(): float
    {
        return $this->high_flow;
    }

    /**
     * @return float
     */
    public function getLowFlow(): float
    {
        return $this->low_flow;
    }

    /**
     * @return float
     */
    public function getHighLimit(): float
    {
        return $this->high_limit;
    }

    /**
     * @return float
     */
    public function getLowLimit(): float
    {
        return $this->low_limit;
    }

    /**
     * @return int
     */
    public function getVolume(): int
    {
        return $this->volume;
    }

    /**
     * @return float
     */
    public function getVariation(): float
    {
        return $this->variation;
    }

    /**
     * @return int
     */
    public function getIdCompany(): int
    {
        return $this->idCompany;
    }

}