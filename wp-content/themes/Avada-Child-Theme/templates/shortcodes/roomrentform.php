<h1><?php echo __('Szobafoglalás', 'hotel'); ?></h1>
<h2><?php echo __('Adja meg az alábbi űrlapon a szobafoglaláshoz szükséges adatokat.', 'hotel'); ?></h2>

<form class="" id="mailsend" action="index.html" method="post">
  <div class="room-rent-wrapper date-container">
    <div class="input-holder">
      <div class="input input-label"><h3><div class="stn">1</div><?php echo __('Mennyi időre szeretnének szobát foglalni?', 'hotel'); ?></h3></div>
      <div class="input date_from">
        <label for="date_from"><?php echo __('Érkezés ideje', 'hotel'); ?> *</label>
        <input type="text" class="datepicker" name="roomrent[date][from]" readonly="readonly" id="date_from" value="<?=date('Y / m / d', strtotime('+ 1 days'))?>">
      </div>
      <div class="input date_to">
        <label for="date_to"><?php echo __('Távozás ideje', 'hotel'); ?> *</label>
        <input type="text" class="datepicker" name="roomrent[date][to]" readonly="readonly" id="date_to" value="<?=date('Y / m / d', strtotime('+ 3 days'))?>">
      </div>
    </div>
  </div>

  <div class="room-rent-wrapper">
      <div class="input-holder">
        <div class="input input-label"><h3><div class="stn">2</div><?php echo __('Szobafoglalás paraméterek megadása', 'hotel'); ?></h3></div>
        <div class="input people_adults">
          <label for="people_adults"><?php echo __('Felnőttek', 'hotel'); ?> *</label>
          <input type="number" name="roomrent[people][adults]" id="people_adults" value="2" min="1" step="1">
        </div>
        <div class="input people_children">
          <label for="people_children"><?php echo __('Gyerekek', 'hotel'); ?></label>
          <input type="number" name="roomrent[people][children]" id="people_children" value="0" min="0" step="1">
        </div>
        <div class="input settings_children_eroom">
          <label for="settings_children_eroom"><?php echo __('Gyerekek külön szobában', 'hotel'); ?></label>
          <input type="checkbox" name="roomrent[settings][children_eroom]" id="settings_children_eroom"><label for="settings_children_eroom"></label>
        </div>
        <div class="input settings_visittype">
          <label for="settings_visittype"><?php echo __('Foglalás jellege', 'hotel'); ?> *</label>
          <select class="" name="roomrent[settings][visittype]" id="settings_visittype">
            <option value="">-- <?php echo __('válasszon', 'hotel'); ?> --</option>
            <option value="" disabled="disabled"></option>
            <option value="Szabadidő"><?php echo __('Szabadidő', 'hotel'); ?></option>
            <option value="Üzleti"><?php echo __('Üzleti', 'hotel'); ?></option>
          </select>
        </div>
        <div class="input settings_roomtype">
          <label for="settings_roomtype"><?php echo __('Milyen szobát szeretne?', 'hotel'); ?> *</label>
          <select class="" name="roomrent[settings][roomtype]" id="settings_roomtype">
            <option value="">-- <?php echo __('válasszon', 'hotel'); ?> --</option>
            <option value="" disabled="disabled"></option>
            <option value="Strandard I."><?php echo __('Strandard I. (2 személyes - 1 franciaágy)', 'hotel'); ?></option>
            <option value="Strandard II."><?php echo __('Strandard II. (2 személyes - 2 x 1 személyes ágy)', 'hotel'); ?></option>
            <option value="Családi"><?php echo __('Családi (4 személyes - 2 db összenyitható Strandard I./II. szoba)', 'hotel'); ?></option>
          </select>
        </div>
        <div class="input setting_children_ages">
          <label for="settings_children_ages"><?php echo __('Gyerek(ek) kora', 'hotel'); ?></label>
          <input type="text" name="roomrent[settings][children_ages]" id="settings_children_ages" placeholder="<?php echo __('Írja be a gyerek(ek) korát.', 'hotel'); ?>">
        </div>
      </div>
  </div>

  <div class="room-rent-wrapper">
    <div class="input-holder">
      <div class="input input-label"><h3><div class="stn">3</div><?php echo __('Kapcsolattartó adatok', 'hotel'); ?></h3></div>
      <div class="input contact_vezeteknev">
        <label for="contact_vezeteknev"><?php echo __('Vezetéknév', 'hotel'); ?> *</label>
        <input type="text" name="roomrent[contact][vezeteknev]" id="contact_vezeteknev" value="">
      </div>
      <div class="input contact_keresztnev">
        <label for="contact_keresztnev"><?php echo __('Keresztnév', 'hotel'); ?> *</label>
        <input type="text" name="roomrent[contact][keresztnev]" id="contact_keresztnev" value="">
      </div>
      <div class="input contact_telefon">
        <label for="contact_telefon"><?php echo __('Telefonszám', 'hotel'); ?> *</label>
        <input type="text" name="roomrent[contact][telefon]" id="contact_telefon" placeholder="+36 (XX) XXX-XXXX" value="">
      </div>
      <div class="input contact_email">
        <label for="contact_email"><?php echo __('E-mail cím', 'hotel'); ?> *</label>
        <input type="text" name="roomrent[contact][email]" id="contact_email" value="">
      </div>
      <div class="input contact_msg">
        <label for="contact_msg"><?php echo __('Megjegyzés', 'hotel'); ?></label>
        <textarea name="roomrent[contact][msg]" id="contact_msg"></textarea>
      </div>
      <div class="input send-mail">
        <button type="button" id="mail-sending-btn" class="fusion-button" onclick="ajanlatkeresKuldes();" name="button"><?php echo __('Szobafoglalás küldése', 'hotel'); ?> <i class="fa fa-envelope-o"></i></button>
      </div>
    </div>
  </div>
</form>

<script type="text/javascript">
  (function($){
    var dp_options = {
    	closeText: "bezár",
    	prevText: "vissza",
    	nextText: "előre",
    	currentText: "ma",
    	monthNames: [ "Január", "Február", "Március", "Április", "Május", "Június",
    	"Július", "Augusztus", "Szeptember", "Október", "November", "December" ],
    	monthNamesShort: [ "Jan", "Feb", "Már", "Ápr", "Máj", "Jún",
    	"Júl", "Aug", "Szep", "Okt", "Nov", "Dec" ],
    	dayNames: [ "Vasárnap", "Hétfő", "Kedd", "Szerda", "Csütörtök", "Péntek", "Szombat" ],
    	dayNamesShort: [ "Vas", "Hét", "Ked", "Sze", "Csü", "Pén", "Szo" ],
    	dayNamesMin: [ "V", "H", "K", "Sze", "Cs", "P", "Szo" ],
    	weekHeader: "Hét",
    	dateFormat: "yy / mm / dd",
    	firstDay: 1,
    	isRTL: false,
    	minDate: +1,
    	showMonthAfterYear: true,
    	yearSuffix: "",
      onSelect: function(dt, i){
        if($(this).attr('id') == 'date_from')
        {
          var selected_date = new Date(i.currentYear, i.currentMonth, i.currentDay);

          if(!isNaN(selected_date.getTime())){
              var enddate = selected_date;
              enddate.setDate(selected_date.getDate() + 2);
              $("#date_to")
                .val(enddate.toInputFormat())
                .datepicker( "option", "minDate", new Date(i.currentYear, i.currentMonth, i.currentDay) );
          }
        }
      }
    };

    Date.prototype.toInputFormat = function() {
      var yyyy = this.getFullYear().toString();
      var mm = (this.getMonth()+1).toString();
      var dd  = this.getDate().toString();
      return yyyy + " / " + (mm[1]?mm:"0"+mm[0]) + " / " + (dd[1]?dd:"0"+dd[0]);
    };

    $( ".datepicker" ).datepicker( dp_options );
  })(jQuery);
  function resetRoomCheck() {
  jQuery('table.room input[type=radio]').prop('checked', false);
  jQuery('#travel-contact').removeClass('show');
}

var mail_sending_progress = 0;
var mail_sended = 0;
function ajanlatkeresKuldes()
{
  if(mail_sending_progress == 0 && mail_sended == 0){
    jQuery('#mail-sending-btn').html('<?php echo __('Küldés folyamatban', 'hotel'); ?> <i class="fa fa-spinner fa-spin"></i>').addClass('in-progress');
    jQuery('#mailsend .missing').removeClass('missing');

    mail_sending_progress = 1;
    var mailparam  = jQuery('#mailsend').serializeArray();
    jQuery.post(
      '<?php echo admin_url('admin-ajax.php'); ?>?action=send_room_request',
      mailparam,
      function(data){
        var resp = jQuery.parseJSON(data);
        if(resp.error == 0) {
          mail_sended = 1;
          jQuery('#mail-sending-btn').html('<?php echo __('Szobafoglalás elküldve', 'hotel'); ?> <i class="fa fa-check-circle"></i>').removeClass('in-progress').addClass('sended');
        } else {
          jQuery('#mail-sending-btn').html('<?php echo __('Szobafoglalás küldése', 'hotel'); ?> <i class="fa fa-envelope-o"></i>').removeClass('in-progress')
          mail_sending_progress = 0;
          if(resp.missing != 0) {
            jQuery.each(resp.missing_elements, function(i,e){
              jQuery('#mailsend #'+e).addClass('missing');
            });
          }
          alert(resp.msg);
        }
      }
    );
  }
}
</script>
