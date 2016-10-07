<h1>Szobafoglalás</h1>
<h2>Adja meg az alábbi űrlapon a szobafoglaláshoz szükséges adatokat.</h2>

<div class="room-rent-wrapper date-container">
  <div class="input-holder">
    <div class="input input-label"><h3><div class="stn">1</div>Mennyi időre szeretnének szobát foglalni?</h3></div>
    <div class="input date_from">
      <label for="date_from">Érkezés ideje *</label>
      <input type="text" class="datepicker" name="roomrent[date][from]" readonly="readonly" id="date_from" value="<?=date('Y / m / d', strtotime('+ 1 days'))?>">
    </div>
    <div class="input date_to">
      <label for="date_to">Távozás ideje *</label>
      <input type="text" class="datepicker" name="roomrent[date][to]" readonly="readonly" id="date_to" value="<?=date('Y / m / d', strtotime('+ 3 days'))?>">
    </div>
  </div>
</div>

<div class="room-rent-wrapper">
    <div class="input-holder">
      <div class="input input-label"><h3><div class="stn">2</div>Szobafoglalás paraméterek megadása</h3></div>
      <div class="input people_adults">
        <label for="people_adults">Felnőttek *</label>
        <input type="number" name="roomrent[people][adults]" id="people_adults" value="2" min="1" step="1">
      </div>
      <div class="input people_children">
        <label for="people_children">Gyerekek</label>
        <input type="number" name="roomrent[people][children]" id="people_children" value="0" min="0" step="1">
      </div>
      <div class="input settings_children_eroom">
        <label for="settings_children_eroom">Gyerekek külön szobában</label>
        <input type="checkbox" name="roomrent[settings][children_eroom]" id="settings_children_eroom"><label for="settings_children_eroom"></label>
      </div>
      <div class="input settings_visittype">
        <label for="settings_visittype">Foglalás jellege* </label>
        <select class="" name="roomrent[settings][visittype]">
          <option>-- válasszon --</option>
          <option disabled="disabled"></option>
          <option value="Szabadidő">Szabadidő</option>
          <option value="Üzleti">Üzleti</option>
        </select>
      </div>
      <div class="input settings_roomtype">
        <label for="settings_roomtype">Milyen szobát szeretne? </label>
        <select class="" name="roomrent[settings][roomtype]">
          <option>-- válasszon --</option>
          <option disabled="disabled"></option>
          <option value="Strandard I.">Strandard I. (2 személyes - 1 franciaágy)</option>
          <option value="Strandard II.">Strandard II. (2 személyes - 2 x 1 személyes ágy)</option>
          <option value="Családi">Családi (4 személyes - 2 db összenyitható Strandard I./II. szoba)</option>
        </select>
      </div>
      <div class="input setting_children_ages">
        <label for="settings_children_ages">Gyerek(ek) kora</label>
        <input type="text" name="roomrent[settings][children_ages]" id="setting_children_ages" placeholder="Írja be a gyerek(ek) korát.">
      </div>
    </div>
</div>

<div class="room-rent-wrapper">
  <div class="input-holder">
    <div class="input input-label"><h3><div class="stn">3</div>Kapcsolattartó adatok</h3></div>
    <div class="input contact_vezeteknev">
      <label for="contact_vezeteknev">Vezetéknév *</label>
      <input type="text" name="roomrent[contact][vezeteknev]" id="contact_vezeteknev" value="">
    </div>
    <div class="input contact_keresztnev">
      <label for="contact_keresztnev">Keresztnév *</label>
      <input type="text" name="roomrent[contact][keresztnev]" id="contact_keresztnev" value="">
    </div>
    <div class="input contact_telefon">
      <label for="contact_telefon">Telefonszám *</label>
      <input type="text" name="roomrent[contact][telefon]" id="contact_telefon" placeholder="+36 (XX) XXX-XXXX" value="">
    </div>
    <div class="input contact_email">
      <label for="contact_email">E-mail cím *</label>
      <input type="text" name="roomrent[contact][email]" id="contact_email" value="">
    </div>
    <div class="input contact_msg">
      <label for="contact_msg">Megjegyzés</label>
      <textarea name="roomrent[contact][msg]" id="contact_msg"></textarea>
    </div>
  </div>
</div>

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
</script>
