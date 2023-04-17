
<footer>
    <div class="content">
        <div class="top">
            <div class="logo-details">
                <i class="fab fa-slack"></i>
                <span class="logo_name">VIKTORIJA STYLE</span>
            </div>
            <div class="media-icons">
                <a class="sm" href="#"><i class="fab fa-facebook-f"></i></a>
                <a class="sm" href="#"><i class="fab fa-twitter"></i></a>
                <a class="sm" href="#"><i class="fab fa-instagram"></i></a>

                <a class="sm" href="#"><i class="fab fa-linkedin-in"></i></a>
                <a class="sm" href="#"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
        <div class="link-boxes">
            <ul class="box"> 
                <li class="link_name">Kompanija</li>
                
                <li><a href="#">O nama</a></li>
                <li><a href="#">Politika privatnosti</a></li>
                
                <li><a href="#">Galerija</a></li>
            </ul> 
            <ul class="box">
                <li class="link_name">Kontakt</li>
                <li><a>+381(61)3917286</a></li>
                <li><a>+381(60)017085</a></li>
                <li><a href="mailto:sixuniforme@gmail.com">sixuniforme@gmail.com</a></li>
                <script>
                    // proverite da li je JavaScript dostupan
                    if (typeof document.createElement('form').checkValidity !== 'function') {
                      // ako nije, zamenite link sa običnim e-poštanim linkom
                      var link = document.querySelector('a[href^="mailto:"]');
                      link.innerHTML = 'Kontaktirajte nas putem <br> e-pošte na ' + link.getAttribute('href').substr(7);
                    } else {
                      // ako jeste, dodajte kod za prikaz forme ovde
                      var link = document.querySelector('a[href^="mailto:"]');
                      link.addEventListener('click', function(e) {
                        e.preventDefault(); // sprečava slanje e-pošte
                        var form = document.createElement('form');
                        form.setAttribute('action', 'mailto:' + link.getAttribute('href').substr(7));
                        form.setAttribute('method', 'post');
                        form.innerHTML = '<label class="porlab" for="poruka">Poruka:</label><br>' +
                          '<textarea name="poruka" id="poruka" class="porbor" cols="30" rows="10"></textarea><br>' +
                          '<input type="submit" class="porbor" value="Pošalji">';
                        link.parentNode.replaceChild(form, link);
                      });
                    }
                </script>
            </ul>
            <ul class="box">
                <li class="link_name">Informacije</li>
                <li>Radno vreme: 11:00 - 18:00</li>
                <li>Subota: 10:00 - 15:00</li>
                <li>Nedelja: Zatvorena</li>
            </ul>
            <ul class="box input-box">
                <li class="link_name">Lokacija</li>
                <iframe 
   frameborder="0" height="250" scrolling="no" 
   src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4476.601645162976!2d21.902807215504556!3d43.32018120661894!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4755b1cbc0c69daf%3A0xf2284db9055d70c!2sStefan%20I%20Ksenija%20uniforme!5e0!3m2!1ssr!2srs!4v1673967898080!5m2!1ssr!2srs" width="300"></iframe>            </ul>
        </div>
    </div>
    <div class="bottom-details">
        <div class="bottom_text">
            <span class="copyright_text">SIX UNIFORME © 2016 
                <a href="#"></a>All rights reserved
            </span>
            <span class="policy_terms">
                <a href="#">Privacy policy</a>
                <a href="#">Terms & condition</a>
            </span>
        </div>
    </div>
</footer>


