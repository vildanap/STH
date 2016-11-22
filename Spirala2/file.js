function validirajLogIn()
{
	var gr1 =document.getElementById("porukaIme");
	gr1.innerHTML="";

	var gr2 =document.getElementById("porukaPass");
	gr2.innerHTML="";

	var reg=/^[a-zA-Z0-9]{6,}$/;

	//dohvacanje forme i input-a ime
	var forma=document.getElementById('lf');	

	if(forma.ime.value.length==0)
	{
		
		gr1.innerHTML+="Polje ne smije biti prazno!";
		//sprječava redirekciju 
		event.preventDefault();
		return false;
		
	}
	
	if(!(forma.password.value).match(reg))
	{
		gr2.innerHTML+="Minimalna dužina 6 (format: 0-9 A-Z a-z)";
		//sprječava redirekciju 
		event.preventDefault();
		return false;
	}

	return true;
}


function validirajSignIn()
{
	var gr1 =document.getElementById("porukaUser");
	gr1.innerHTML="";

	var gr2 =document.getElementById("porukaPassword");
	gr2.innerHTML="";

	var gr3 =document.getElementById("porukaEmail");
	gr3.innerHTML="";

	var reg=/^[a-zA-Z0-9]{6,12}$/;
	var regEmail =/^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;

	//dohvacanje forme i input-a ime
	var forma=document.getElementById('sf');	

	if(forma.user.value.length==0)
	{
		
		gr1.innerHTML+="Polje ne smije biti prazno!";
		//sprječava redirekciju 
		event.preventDefault();
		return false;
		
	}
	
	if(forma.pass.value.length==0 || (!(forma.pass.value).match(reg)))
	{
		gr2.innerHTML+="Min.dužina 6, max.dužina 12 (format: velika/mala slova/brojevi)";
		//sprječava redirekciju 
		event.preventDefault();
		return false;
	}

	if(forma.email.value.length==0 || (!(forma.email.value).match(regEmail)))
	{
		gr3.innerHTML+="Pogrešan format email-a";
		//sprječava redirekciju 
		event.preventDefault();
		return false;
	}


	return true;
}

function validirajKonkurs()
{
	var gr1 =document.getElementById("porukaPosiljalacIme");
	gr1.innerHTML="";

	var gr2 =document.getElementById("porukaPosiljalacPrezime");
	gr2.innerHTML="";

	var gr3 =document.getElementById("porukaPrica");
	gr3.innerHTML="";

	//dohvacanje forme i input-a ime
	var forma=document.getElementById('fs');	

	if(forma.ime.value.length==0)
	{
		
		gr1.innerHTML+="Polje ne smije biti prazno!";
		//sprječava redirekciju 
		event.preventDefault();
		return false;
		
	}
	
	if(forma.prezime.value.length==0 )
	{
		gr2.innerHTML+="Polje ne smije biti prazno!";
		//sprječava redirekciju 
		event.preventDefault();
		return false;
	}

	if(forma.Text1.value.length>1000 || forma.Text1.value.length<500)
	{
		gr3.innerHTML+="Broj riječi: min.500 karaktera/max.1000 karaktera";
		//sprječava redirekciju 
		event.preventDefault();
		return false;
	}


	return true;
}

 var galerija = new Array();
 var i=0;
 galerija[0]='slike/najava.jpg';    
 galerija[1]='slike/najava2.jpg';
 galerija[2]='slike/najava3.jpg';
 galerija[3]='slike/najava4.jpg';

function prethodna(){

    if (i>0){
     i--;
    } 
    else {
     i=galerija.length-1;
    }

    //promjena trenutne slike sa nekom iz galerije
    document.getElementById("slikaTrenutna").src=galerija[i];
    return false;
 }

 function sljedeca()
 {
    if (i<3){
     i=i+1;
    } else {
     i=0; //vrati na pocetnu sliku
    }
 document.getElementById("slikaTrenutna").src=galerija[i]; 
 return false;
}


function prikaziStabloJedan()
{
	var sadrzajPrvogPodstabla = document.getElementById("sadrzajStablaJedan");
	if(sadrzajPrvogPodstabla.style.display==="block"){
		sadrzajPrvogPodstabla.style.display="none";
		document.getElementById("btn").value="+Novosti";}
		else {

			sadrzajPrvogPodstabla.style.display="block";
			document.getElementById("btn").value="-Novosti";}
		}


function prikaziStabloDva()
{
	
		var sadrzajDrugogPodstabla = document.getElementById("sadrzajStablaDva");
	    if(sadrzajDrugogPodstabla.style.display=="block"){
		sadrzajDrugogPodstabla.style.display="none";
		document.getElementById("btn2").value="+Galerija";}
		else {

		sadrzajDrugogPodstabla.style.display="block";
		document.getElementById("btn2").value="-Galerija";}
}
	

function ucitajPodstranicu(podstranica)
{
	var ajax = new XMLHttpRequest();
		   ajax.onreadystatechange = function () {
				  if (ajax.readyState == 4 && ajax.status == 200)
                        document.getElementById("podstranica").innerHTML = ajax.responseText;
                    if (ajax.readyState == 4 && ajax.status == 404)
                        document.getElementById("podstranica").innerHTML = podstranica;
                }
             

                if (podstranica === 'pocetna') {
                    ajax.open("GET", "ind2.html", true);
                    ajax.send();
                }
                if (podstranica === 'novosti') {
                    ajax.open("GET", "novosti.html", true);
                    ajax.send();
                }
                if (podstranica === 'historija') {
                    ajax.open("GET", "historija.html", true);
                    ajax.send();
                }
                if (podstranica === 'sarajevskeprice') {
                    ajax.open("GET", "sarajevskePrice.html", true);
                    ajax.send();
                }
                if (podstranica === 'login') {
                    ajax.open("GET", "login.html", true);
                    ajax.send();
                }
                 if (podstranica === 'antika') {
                    ajax.open("GET", "antika.html", true);
                    ajax.send();
                }
}