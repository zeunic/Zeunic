<?
class NavWidget extends CWidget
{
	public $page;
	public $pages;
    public function init()
    {
        // this method is called by CController::beginWidget()
        
        $this->pages = array(array('portfolio', 'our work'), array('about', 'about us'), array('contact', 'contact'), array('login', 'login'), array('search', 'search'));
    }
 
    public function run()
    {
        // this method is called by CController::endWidget()
        $this->render('nav', array('pages'=>$this->pages, 'page'=>$this->page));
    }
}