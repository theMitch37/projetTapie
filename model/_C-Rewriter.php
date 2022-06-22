<?php

class Rewriter
{
    private $url = "";
    private $headerPath = "./view/header.html";
    private $headPath = "./view/head.html";
    private $def;
    private $page;

    //Constructeur
	public function __construct($tab) {
		$this->hydrate($tab);
    }
    // DESIGN PATTERN - Hydratation d'un objet
	public function hydrate(array $data) {
		foreach ($data as $index => $valeur) {
			$methodeAcces="set".ucfirst($index);
			if (method_exists($this,$methodeAcces)) {$this->$methodeAcces($valeur);}
		}
    }

    //GETTER
    function getUrl()
    {
        return $this->url;
    }
    function getHead()
    {
        return $this->head;
    }
    function getHeader()
    {
        return $this->header;
    }

    //SETTER
    function setUrl($value)
    {
        $this->url = $value;
    }



    function drawHeader()
    {
        include($this->getHeader());
    }

    function drawHead()
    {
        include($this->getHead());
    }
    function explodeUrl()
    {
        if($this->url != "")
        {
            $tab = explode("/", $this->url);
            if(count(glob("./views/_".$tab[count($tab)-1].".php")) == 0)
            {
                $this->defaultPage();
            }
            else
            {
                $this->page = $tab[count($tab)-1];
                rootPage();
            }

        }
    }
    function rootPage()
    {
        include("./views/_".$this->page.".php");
    }
    function defaultPage()
    {
        include($this->def);
    }
    function init()
    {
        $this->drawHeader();
        $this->explodeUrl();
    }
    
}

?>