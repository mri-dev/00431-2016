<?php

class AjaxRequests
{
  public function __construct()
  {
    return $this;
  }

  public function send_room_request()
  {
    add_action( 'wp_ajax_'.__FUNCTION__, array( $this, 'sendRoomRequest'));
    add_action( 'wp_ajax_nopriv_'.__FUNCTION__, array( $this, 'sendRoomRequest'));
  }

  public function sendRoomRequest()
  {
    extract($_POST);
    $return = array(
      'error' => 0,
      'msg'   => '',
      'missing_elements' => [],
      'error_elements' => [],
      'missing' => 0,
      'passed_params' => false
    );

    $err_elements_text = '';

    $return['passed_params'] = $_POST['roomrent'];
    $contact  = $_POST['roomrent']['contact'];
    $date     = $_POST['roomrent']['date'];
    $people   = $_POST['roomrent']['people'];
    $settings = $_POST['roomrent']['settings'];

    if(empty($contact['keresztnev'])) $return['missing_elements'][] = 'contact_keresztnev';
    if(empty($contact['vezeteknev'])) $return['missing_elements'][] = 'contact_vezeteknev';
    if(empty($contact['email'])) $return['missing_elements'][] = 'contact_email';
    if(empty($contact['telefon'])) $return['missing_elements'][] = 'contact_telefon';
    if(empty($settings['roomtype'])) $return['missing_elements'][] = 'settings_roomtype';
    if(empty($settings['visittype'])) $return['missing_elements'][] = 'settings_visittype';


    if(!empty($return['missing_elements'])) {
      $return['error']  = 1;
      $return['msg']    =  __('Kérjük, hogy töltse ki az összes mezőt a szobafoglalás küldéséhez.', 'hotel');
      $return['missing']= count($return['missing_elements']);
      $this->returnJSON($return);
    }


    if(empty($people['adults']) || $people['adults'] == 0 || $people['adults'] < 0 ){
      $return['error_elements'][] = 'people_adults';
      $return['missing_elements'][] = 'people_adults';
      $err_elements_text .= ' - '.__('Felnőttek száma: Legalább 1 felnőtt részére', 'hotel') . "\n";
    }
    if($people['children'] != '0' && $settings['children_ages'] == ''){
      $return['error_elements'][] = 'settings_children_ages';
      $return['missing_elements'][] = 'settings_children_ages';
      $err_elements_text .= ' - '.sprintf(__('Gyermek(ek) kora: Adja meg a %s gyeremek korát.', 'hotel'), $people['children'] ) . "\n";
    }

    if(!empty($return['error_elements'])) {
      $return['error']  = 1;
      $return['msg']    =  __('A következő mezők hibásan vannak kitöltve', 'hotel').":\n". $err_elements_text;
      $return['missing']= count($return['missing_elements']);
      $this->returnJSON($return);
    }

    $to       = get_option('admin_email');
    $subject  = sprintf(__('Szobafoglalás érkezett: %s (%s | %s)'), $contact['vezeteknev'].' '.$contact['keresztnev'], $contact['email'], $contact['telefon']);

    ob_start();
  	  include(locate_template('templates/mails/szobafoglalas-ertesites.php'));
      $message = ob_get_contents();
		ob_end_clean();

    //add_filter( 'wp_mail_from', array($this, 'getMailSender') );
    add_filter( 'wp_mail_from_name', array($this, 'getMailSenderName') );
    add_filter( 'wp_mail_content_type', array($this, 'getMailFormat') );

    $headers    = array();
    $headers[]  = 'Reply-To: '.$contact['vezeteknev'].' '.$contact['keresztnev'].' <'.$contact['email'].'>';

    /* */
    $alert = wp_mail( $to, $subject, $message, $headers );

    if(!$alert) {
      $return['error']  = 1;
      $return['msg']    = __('A szobfoglalást jelenleg nem tudtuk elküldeni. Próbálja meg később.', 'hotel');
      $this->returnJSON($return);
    }
    /* */

    echo json_encode($return);
    die();
  }

  public function getMailFormat(){
      return "text/html";
  }

  public function getMailSender($default)
  {
    return get_option('admin_email');
  }

  public function getMailSenderName($default)
  {
    return get_option('blogname', 'Wordpress');
  }

  private function returnJSON($array)
  {
    echo json_encode($array);
    die();
  }

}
?>
