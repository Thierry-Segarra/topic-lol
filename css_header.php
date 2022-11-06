
<script>

pageurl();
function pageurl(){
    var page = "";
    page = window.location.href;
    if(page != ""){
        if(page.search('index.php') != -1){
            document.getElementByName('page1').style.color = 'crimson';
            document.getElementsByName('page2').style.color = 'black';
            document.getElementsByName('page3').style.color = 'black';
        }else if(page.search('connection.php') != -1 || page.search('inscription.php') != -1){
            document.getElementsByName('page1').style.color = 'black';
            document.getElementsByName('page2').style.color = 'crimson';
            document.getElementsByName('page3').style.color = 'black';
        }else if(page.search('profil.php') != -1){
            document.getElementsByName('page1').style.color = 'black';
            document.getElementsByName('page2').style.color = 'black';
            document.getElementsByName('page3').style.color = 'crimson';
        }
    }
}
</script>