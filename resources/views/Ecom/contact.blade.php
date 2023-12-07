<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
    <link rel="stylesheet" href="css/contact.css">
</head>
<body>
    @include('partials.nav')
    <div class="contactus">
        <div class="title">
            <h1>Get In Touch</h1>
        </div>
        <div class="box">
            <div class="contact form">
                <h3>Kirim pesan</h3>
                <form action="/pesan" method="post">
                    @csrf
                    <div class="formBox">
                        <div class="row50">
                            <div class="inputBox">
                                <span>Nama Awal</span>
                                <input type="text" name="nama_awal" id="" placeholder="Udin">
                            </div>
                            <div class="inputBox">
                                <span>Nama Akhir</span>
                                <input type="text" name="nama_akhir" id="" placeholder="Komarudin">
                            </div>
                        </div>
                        <div class="row50">
                            <div class="inputBox">
                                <span>Email</span>
                                <input type="text" name="email" id="" placeholder="Udin@gmail.com">
                            </div>
                            <div class="inputBox">
                                <span>No Handphone</span>
                                <input type="text" name="no_telp" id="" placeholder="+62-855-7057-401">
                            </div>
                        </div>
                        <div class="row100">
                            <div class="inputBox">
                                <span>Pesan</span>
                                <textarea name="pesan" id="pesan" placeholder="Pesan dan masukan"></textarea>
                            </div>
                        </div>
                        <div class="row100">
                            <div class="inputBox">
                                <input type="button" value="Send" onclick="openPopup()">
                            </div>
                        </div>
                    </div>
                    <div class="kontener">
                        <div class="popup" id="popup">
                            <img src="img/verif.png" alt="">
                            <h2>Thank you!</h2>
                            <p>Your Response Has Recorded</p>
                            <button type="submit" onclick="closePopup()">OK</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="contact info">
                <h3>Contact Info</h3>
                <div class="infoBox">
                    <div>
                        <span><ion-icon name="location-sharp"></ion-icon></span>
                        <p>Jl.Smkn 06 Depok,Depok <br>Indonesia</p>
                    </div>
                    <div>
                        <span><ion-icon name="mail"></ion-icon></span>
                        <a href="#">Ucok@gmail.com</a>
                    </div>
                    <div>
                        <span><ion-icon name="call-sharp"></ion-icon></span>
                        <a href="#">+62-855-7057-401</a>
                    </div>
                </div>
                <ul class="sci">
                    <li><a href="#"><ion-icon name="logo-instagram"></ion-icon></a></li>
                    <li><a href="#"><ion-icon name="logo-facebook"></ion-icon></a></li>
                    <li><a href="#"><ion-icon name="logo-twitter"></ion-icon></a></li>
                </ul>
            </div>
            <div class="contact map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.6754689787513!2d106.82742551449526!3d-6.435712964723846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ea24cb2b1d85%3A0x1a9a44be3b87596c!2sJl.%20SMPN%206%20Kalibaru%20No.147%2C%20Kalibaru%2C%20Kec.%20Cilodong%2C%20Kota%20Depok%2C%20Jawa%20Barat%2016413!5e0!3m2!1sen!2sid!4v1665413508399!5m2!1sen!2sid"style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
    let popup = document.getElementById("popup");
    function openPopup(){
        popup.classList.add("open-popup");
    }
    function closePopup(){
        popup.classList.remove("open-popup");
    }
</script>
</html>