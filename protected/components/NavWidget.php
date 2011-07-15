<?
class NavWidget extends CWidget
{
	public $page;
	public $pages;
    public function init()
    {
        // this method is called by CController::beginWidget()
        
        $this->pages = array(array('portfolio', 'Our Work'), array('about', 'About Us'), array('contact', 'Contact'), array('login', 'Login'), array('search', 'Search'));
    }
 
    public function run()
    {
        // this method is called by CController::endWidget()
        $this->render('nav', array('pages'=>$this->pages, 'page'=>$this->page));
    }
}