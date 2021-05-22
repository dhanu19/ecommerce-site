<?php
class Cron extends CI_Controller {

         public function abc($to = 'World')
         {
                 echo "Hello {$to}!".PHP_EOL;
         }  
  

        public function db_backup(){
                // Load the DB utility class
                $this->load->dbutil();

                // Backup your entire database and assign it to a variable
                $backup = $this->dbutil->backup();

                // Load the file helper and write the file to your server
                $this->load->helper('file');
                write_file('D:/XENTO SYSTEMS/backup/mybackup.gz', $backup);

                // Load the download helper and send the file to your desktop
                $this->load->helper('download');
                force_download('mybackup.gz', $backup);
        }
}
?>

