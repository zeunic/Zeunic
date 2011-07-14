<?
class NavWidget extends CWidget
{
	public $page;
	public $pages;
    public function init()
    {
        // this method is called by CController::beginWidget()
        
        $this->pages = array(array('about', 'About Us'), array('search', 'Search'), array('contact', 'Contact'), array('login', 'Login'), array('portfolio', 'Our Work'));
    }
 
    public function run()
    {
        // this method is called by CController::endWidget()
        $this->render('nav', array('pages'=>$this->pages, 'page'=>$this->page));
    }
}