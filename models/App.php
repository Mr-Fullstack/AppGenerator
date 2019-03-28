<?php 
/** 
 *ClassName: App
 *Author: Marcos Cerqueira
 *Date: 22/03/2019
 *Licensed for use free.
 * 
 *class responsed by create and register all configurations of project!
 *
 * @copyright (c) 2019, Marcos Antonio Cerqueira. Labs'sCode - labscode.tech
 */

class App{ 

    private $app;
    private $name;
    private $type;
    private $mod;

/**
     * <b>Start App:</b> Define as Configs of app project and some $appName is need
     * @param STRING $appName = Ex: name_app
     * @param INT $appType=  type of project, Ex: 1 for type MVc or 2 for LARAVEL MVC coming soon
     * @param STRING $appMod = with this aplication will go run Ex: full for manipulation complete with Delete Update Read for all documents
     * @param STRING $appOs = When the version System Operational a moment run Ex: W for Windows, L for linux the word need box larger
     */

    public function __construct ( string $name, int $type = 1, String $mod = 'full') {
       
        $this->name = $name; 
        $this->type = $type;

        if ( $mod == 'full' || $mod == 'read' ||  $mod == 'delete' ||  $mod == 'import' )
        { 
            $this->mod = $mod;     
        }
        else
        {
            print "error this mod app is invalid, please insert an mode of project correct on format string <br>Ex:choose between  full, read, import. <br>\n<br>\n";
        }
    
        $this->app  = new Dir ( $this->name, PATH, $this->type, $this->mod );  
        Self::Create();
    }

    /**
     * <b>VerifY info app:</b> Execute an verification inside of Array $data in $this=>variables
     * @param  ARRAY $data = Array $data content $this=>variables
     * @return STRING foreach() in $data =  print $InfoName and $values
     */
    public function info () {

        $data = [
                    'appName' =>  $this->name,
                    'appType' =>  $this->type,
                    'appMod'  =>  $this->mod,
               ];
            
        print "App has been latest show in ".date('Y-m-d H:i:s')."<br>\n<br>\n";
        print "Organized by : [ definition name ] and values <br>\n<br>\n";

        foreach ( $data  as $InfoName => $values ) 
        {
            print "[ ".$InfoName." ] => ".$values."<br>\n";
        }
    }

    /**
     * <b>VerifY info app:</b> Execute an verification inside of document info.php and return an Array $data in $this=>variables
     * @param  OBJECT $appName cast in array for use foreach() and extract information reffer a appName 
     * OR
     * @param  STRING $appName name of folder inside 'projects' root folder for find document info.txt
     * @return STRING foreach() in $appInfo =  print substr($row,0,-2) for remove characters invalide Ex: ( '' , <br> )
     */
    public static function infoApp ( $appName ) {

        if ( is_object ( $appName ) )
        {
            $newApp= ( Array ) $appName;
            foreach ( $newApp as $values)   
            {
                if ( !is_object( $values ) )
                {  
                    $appInfo= file("C:/xampp/htdocs/appGenerator/projects/{$values}/info.txt");
                    foreach ( $appInfo  as $row ) 
                            {
                                echo "<pre>";
                                print substr($row,0,-2);
                                echo "</pre>";
                            } 
                    break;
                }
            }       
        }
        else
        {
            $appInfo= file("C:/xampp/htdocs/appGenerator/projects/$appName/info.txt");

            foreach ( $appInfo  as $row ) 
            {
                echo "<pre>";
                print substr($row,0,-2);
                echo "</pre>";
            } 
        }    
     }
   
     /**
     * <b>VerifY size documents app:</b> Execute an verification inside of folders the project 
     * @param  STRING $flName name of folder where have the document for find
     * @param  STRING  $docName name of document what want 
     * @param  FUNCTION $b value of filesize $doc finded
     * @return STRING foreach() in $docs =  echo $docs and $doc
     */
     public static function sizeDoc ( string $flName, string $docName ) {

        if ( is_dir ( PATH ) )
        {
            $linhas = scandir ( PATH );
            foreach (  $linhas as $linha ) 
            {
                if ( $linha == $flName ) 
                {
                    if ( is_dir ( PATH.$flName ) )
                    {
                        $docs = scandir ( PATH.$flName );
                        foreach ( $docs as $doc ) 
                        {
                            if (  $doc == $docName )
                            {
                                $b = filesize(PATH.$flName.'/'.$doc);
                                echo 'this document '.$doc.' in folder '.$flName.' have: <b>'.( substr($mb= $b*0.0292571428571429/1024,0,6)).'</b> Mb';
                            }
                        } 
                    }
                }       
            } 
        }
         
     }
   


    /**
     * <bCreate app:</br> Execute an creation of app inside of the folder root of server [htdocs] if XAMPP or [www] if WAMP,lAMP,mAMP
     * @param  OBJECT $app = instance of Dir Class
     * @return OBJECT $app = new Dir ;
     */
    private function Create ( ) {
        $this->app->createDir();
        return $this->app;            
    }

    private function deleteApp ( string $Name, string $dir ) {

    }

    public static function listApp ( ) {

        if ( is_dir ( PATH ) )
        {
            $c = 0;
            $projects = scandir ( PATH );
            if ( count ( $projects )  <= 2 )
            {
                echo " <b> not found project!</b> <br>\n";
            }
            else 
            {
                foreach ( $projects as $ind => $project ) 
                {
                    if ( $ind != 0 and $ind != 1 )
                    {   
                        $c++;
                        echo "$c - <b> $project </b> <br>\n";
                    }              
                }
            }
            echo "<br>\n";
            echo "(<b>$c</b>) Project"; if  ($c > 1) : echo's '; endif; echo ' Find.'; 
        }
    }


}
