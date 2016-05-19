<?php
  /*
  * Plugin Name: myContact
  * Description: Um pequeno plugin de formulário para contato.
  * Author: Magnorion
  * Version: 1.1
  * Author uri: http://github.com/magnorion
  */
  class MyContact{
    function __construct(){
      ### Remove o plugin das páginas de adminstração!
      if(!is_admin()){
        add_action("wp_enqueue_scripts",array($this,"enqueue_files"));
        add_action("wp_footer",array($this,"builder"));
      }else{
        return false;
      }
    }

    ### Função para carregar os arquivos!
    public function enqueue_files(){
      $directory = plugin_dir_url( __FILE__ );
      wp_enqueue_script("jquery-core",$directory."/assets/vendor/jquery/dist/jquery.min.js");
      wp_enqueue_script("jquery-ui",$directory."/assets/vendor/jquery-ui/jquery-ui.min.js");
      wp_enqueue_script("myContact-jquery-mask",$directory."/assets/vendor/jquery-mask/jquery.mask.js");
      wp_enqueue_script("myContact-scripts",$directory."/assets/js/script.min.js");
      wp_enqueue_style("myContact-styles",$directory."/assets/css/style.css");
      wp_enqueue_style("font-awesome",$directory."/assets/vendor/font-awesome/css/font-awesome.min.css");

      ### Esta linha só funciona em ambiente de desenvolvimento ( Grunt )
      wp_enqueue_script("livereload","http://localhost:460/livereload.js");
    }

    ### chama o construtor
    public function builder(){
      ### Cria a variavel global ajaxurl
      echo "<script>";
      echo "var ajaxurl = '".admin_url("admin-ajax.php")."';";
      echo "</script>";

      require_once("build_plugin/index.php");
    }

    ### Função usada para envio do email
    public function send_form_email(){
      require_once("email/mailer.php");
    }
  }
  ### Inicia o plugin
  $myContact = new MyContact;

  ### Ajax de envio de email
  add_action("wp_ajax_send_form_email",array($myContact,'send_form_email'));
  add_action("wp_ajax_nopriv_send_form_email",array($myContact,'send_form_email'));
?>
