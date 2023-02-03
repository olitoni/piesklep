function wczytaj (odPozycji) {
    let prosbaXML = new XMLHttpRequest(); 
    prosbaXML.onreadystatechange = function () {
    
        if (this.status == 200 && this.readyState== 4) { 
            document.getElementById("komentarze").innerHTML += this.responseText; 
            document.getElementById("przycisk").onclick= () => { wczytaj (odPozycji+3); };
        } 
    }
    prosbaXML.open("GET", "ajax.php?odPozycji=" + odPozycji, true); 
    prosbaXML.send();
} 