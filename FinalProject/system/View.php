<?php
/* 
 * Kristin Greenman
 * CPTS 483
 * HW #3
 */
class View
{
    public $alldata = array();
    public $name = "";
    public $file = "";
    public $content = "Error: no content";
    
    function __construct($data, $view_file = "index") {
        if ($data == NULL) {$data = array();}
        $this->alldata['view_bag'] = $data;
        $this->file = $view_file;    
    }
    
    function setName($view_name)
    {
        $this->name = $view_name;
        //echo "ViewName=" . $this->name;
    }
    
    function setBody()
    {
        extract($this->alldata);
        ob_start();
        include(root . ds . "views" . ds . $this->name . ds . $this->file . ".php");
        $this->alldata['mvc_body'] = ob_get_contents();
        ob_end_clean();
        //echo "ViewBody=" . $this->alldata['mvc_body']; //FOR TESTING
        return $this->alldata['mvc_body'];
    }
    
    function render()
    {
        //Find header and body if they exist
        //Find header
        if(file_exists($filename = root . ds . "views" . ds . $this->name . "header.php"))
        {
            extract($this->alldata);
            ob_start();
            include($filename);
            $this->alldata['mvc_header'] = ob_get_contents();
            ob_end_clean();
        }
        else if(file_exists($filename = root . ds . "views" . ds . "header.php"))
        {
            extract($this->alldata);
            ob_start();
            include($filename);
            $this->alldata['mvc_header'] = ob_get_contents();
            ob_end_clean();
        }
        else{
            $this->alldata['mvc_header'] = "";
        }
        
        $content = "No content";
        //Check for local layout.php file
        if(file_exists($filename = root . ds . "views" . ds . $this->name . "layout.php"))
        {
            extract($this->alldata);
            ob_start();
            include($filename);
            $content = ob_get_contents();
            ob_end_clean();
        }
        else if(file_exists($filename = root . ds . "views" . ds . "layout.php")) //Check for global layout.php
        {
            //echo "Found file: " . $filename; //FOR TESTING
            //echo $this->alldata['mvc_body']; //FOR TESTING
            extract($this->alldata);
            ob_start();
            include($filename);
            $content = ob_get_contents();
            ob_end_clean();
        }
        else if(file_exists($filename = root . ds . "views" . ds . $this->name . ".php"))
        {
            extract($this->alldata);
            ob_start();
            include($filename); //Directly render 
            $content = ob_get_contents();
            ob_end_clean();
        }
        echo $content;
    }
}
