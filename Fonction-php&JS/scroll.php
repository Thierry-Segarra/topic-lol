<script>
window.onscroll = function(ev) {
        if (window.scrollY > 100 && window.screen.availWidth > 900){
            document.getElementById("navbar").style.background = "black";
            document.getElementById("scrollUp").style.right = "10px";
            
            var li = document.querySelectorAll(".nav-links li #navlinks");

            for(var i = 0; li[i]; i++){       
            li[i].style.color = "white";
            }

        }
        else{
            document.getElementById("navbar").style.background = "none";
            document.getElementById("scrollUp").style.right = "-100px";
            var li = document.querySelectorAll(".nav-links li #navlinks");

            for(var i = 0; li[i]; i++){       
            li[i].style.color = "black";
            }
        }

        if (window.scrollY > 100 && window.screen.availWidth < 900){
            document.getElementById("scrollUp").style.right = "10px";
        }
};

const menuHamburger = document.querySelector(".menu-hamburger")
        const navLinks = document.querySelector(".nav-links")
 
        menuHamburger.addEventListener('click',()=>{
        navLinks.classList.toggle('mobile-menu')
        })
</script>