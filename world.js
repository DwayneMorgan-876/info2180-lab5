function page(){

  document.getElementById("lookup").addEventListener("click", function(){      
  var inputVal = document.getElementById("country").value;
  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function(){
      if (this.readyState == 4 && this.status == 200){
        
        document.getElementById("result").innerHTML = xhr.responseText;

      }
    }
    xhr.open("GET", "world.php?country="+inputVal);
    xhr.send();
  });

  document.getElementById("lookup-cities").addEventListener("click", function(){      
  var inputVal = document.getElementById("country").value;
  var xhr = new XMLHttpRequest();


  xhr.onreadystatechange = function(){
      if (this.readyState == 4 && this.status == 200){
        
        document.getElementById("result").innerHTML = xhr.responseText;

      }
    }
  xhr.open("GET", "world.php?country=" +inputVal+ "&context=lookup-cities");
  xhr.send();
  });

}
window.onload=page;
