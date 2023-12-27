


<section id="contact">
<div class="row">
<div class="leftcolumn">
  <div class="card">
    <h2 class="centerh1">Contact</h2>
      <form action="index.php?op=contactprocess" method="post">
          <label for="fname">Voornaam</label>
          <input type="text" id="fname" name="fname" placeholder="Uw voornaam...">
          <label for='preposition'>Tussenvoegsel's</label>
          <input type='text' id='preposition' name='preposition' placeholder='Uw tussenvoegsels...'>
          <label for="lname">Acternaam</label>
          <input type="text" id="lname" name="lname" placeholder="Uw achternaam...">
          <label for="email">E-mail</label>
          <input type="text" id="email" name="email" placeholder="Uw e-mailadres...">
          <label for="company">Bedrijf</label>
          <input type="text" id="company" name="company" placeholder="Uw bedrijfsnaam...">
          <label for="subject">Vraag</label>
          <textarea id="subject" name="subject" placeholder="Wat is uw vraag?..." style="height:200px"></textarea>
          <input type="submit" value="Verstuur">
      </form>
  </div>
  </div>
<div class="rightcolumn">
  <div class="card">
    <p>U kunt mij ook een mailtje sturen op dit adres</p>
     <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
     <button data-text="thijs0302@gmail.com" class="emailbutton">Kopieer mijn e-mailadres</button>
     <p id="succesmessage">E-mailadres is succesvol gekopieerd</p>
  </div>
</section>

