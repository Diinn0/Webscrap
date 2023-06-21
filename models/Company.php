<?php

class Company
{

    private string $label;
    private string $codeISIN;
    private string $codeEnt;

    /**
     * @param string $label
     * @param string $codeISIN
     * @param string $codeEnt
     */
    public function __construct(string $label, string $codeISIN, string $codeEnt)
    {
        $this->label = $label;
        $this->codeISIN = $codeISIN;
        $this->codeEnt = $codeEnt;
    }

    public static function addCompany(Company $company) : bool {

        $pdo = new Database();
        $request = $pdo->getPdoInstance()->prepare("INSERT INTO Message 
                                                (
                                                 'label', 'codeISIN', 'codeEnt'
                                                 )
                                                VALUES
                                                (
                                                 ':label', ':codeISIN', ':codeEnt'
                                                 )");

        $request->bindValue(':label', $company->label);
        $request->bindValue(':codeISIN', $company->codeISIN);
        $request->bindValue(':codeEnt', $company->codeEnt);

        return $request->execute();
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @return string
     */
    public function getCodeISIN(): string
    {
        return $this->codeISIN;
    }

    /**
     * @return string
     */
    public function getCodeEnt(): string
    {
        return $this->codeEnt;
    }


}