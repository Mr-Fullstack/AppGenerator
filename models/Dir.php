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


class Dir{ 

   private $name;
   private $flRoot;
   private $type;
   private $mod;

   
   public function __construct ( $name, $flRoot, $type, $mod ){

    $this->name = $name;
    $this->flRoot = $flRoot;
    $this->type = $type;
    $this->mod = $mod;
   }
    
   public function createDir (/*App $Os*/ ){

        $path = $this->flRoot;
        $dir = $path.$this->name;

        if ( file_exists ( $dir ) )
        {
            echo " ' <b>$this->name </b> ' ".' Exists ! please create this new project with another name  <br>';
            echo "<br>\n";
        }
        else
        {
            mkdir($dir, 0777 );
            
            echo '<b>'.$this->name .'</b> app create on sucess ! '."<br>\n";
            echo "<br>\n";
            foreach ( FOLDERS as $folder) 
            {   
                mkdir($dir.'/'.$folder, 0777 );

                if ( file_exists ( $dir.'/Assets' ) ){
                    mkdir($dir.'/Assets/css' , 0777 );
                    mkdir($dir.'/Assets/js' , 0777 );
                }
            }
            foreach ( DOCUMENTS as $doc  ) 
            {   
                fopen ($dir .'/'.$doc,'w+');
                if ( file_exists ( $dir.'/.htaccess' ) )
                {
                    $ht = fopen ( $dir.'/.htaccess','w');
                    fwrite ( $ht, "RewriteEngine On\n" );
                    fwrite ( $ht, "RewriteCond %{SCRIPT_FILENAME} !-f\n" );
                    fwrite ( $ht, "RewriteCond %{SCRIPT_FILENAME} !-d\n" );
                    fwrite ( $ht, "RewriteRule ^(.*)$ index.php?url=$1 [QSA,L]\n" );
                    fwrite ( $ht, "\n" );
                    fwrite ( $ht, "Options -Indexes\n" );
                }
                if ( file_exists ( $dir.'/info.txt' ) )
                {
                    $date=DATE_TODAY;
                    $ht = fopen ( $dir.'/info.txt','w');
                    fwrite ( $ht, "$this->name App has been created in '".$date."',\n" );
                    fwrite ( $ht, "\n" );
                    fwrite ( $ht, "    [ appName ] => <b>$this->name</b>,\n");
                    fwrite ( $ht, "    [ appType ] => <b>$this->type</b>,\n");
                    fwrite ( $ht, "    [ appMod  ] => <b>$this->mod</b>,\n");
    
                }

            }
            
        
            }
     
        }  
        
      
  
}
 

