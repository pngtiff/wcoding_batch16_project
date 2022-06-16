<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>footer</title>
    <script src="https://kit.fontawesome.com/949df75f70.js" crossorigin="anonymous"></script>
</head>
<body>
    <style>
        footer{
            display:flex;
            width: 100%;
            height: 15vh;
        }
        .contact{
            line-height: 0.5;
        }

        /* .footerRight{
            word-spacing: 5px;
        } */
    </style>

    <footer class="footer">
        <div class="contact">
            <h3>Contact</h3>
            <p>23, SeonYu-Ro 49-gil, Suite 1101</p>
            <p>YeongDeungPo-Gu, Seoul, South Korea</p>
            <p>02-123-4567</p>
            <a href="#"><p>info@room-ez.com</p></a>
            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>        
            <a href="#"><i class="fa-brands fa-instagram-square"></i></i></a>        
            <a href="#"><i class="fa-brands fa-twitter"></i></a> 
        </div>

        <div class="footerRight">
            <div class="aboutUs">
            <a href="#"> <h3>About Us</h3></a>
                <!-- <p>introduction  of ROOM-EZ</p> -->
            </div>
    
            <div class="services">
            <a href="#"><h3>Services</h3></a>
                <!-- <a href="#">Advertise whole property or a room</a>
                <a href="#">Search for a whole property or a room</a>
                <a href="#">Roommate finder</a> -->
            </div>
    
            <div id="modalBoxPrivacy" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                  <span class="close">&times;</span>
                </div>
            </div>

            <div class="privacy">
                <a href=""><h3>Privacy</h3></a>
            </div>
    
            <div class="terms"><a href="#"><h3>Terms</h3></a></div>
        </div>
    </footer>
    <script src="public/js/footerPrivacy.js"></script>
</body>
</html>