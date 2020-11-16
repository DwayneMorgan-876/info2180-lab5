window.onload=function page(){

  document.getElementsByClassName("lookup")[0].addEventListener("click", function(){
    
    var inputVal = document.getElementById("country").value;

var xhr = new XMLHttpRequest();
xhr.onreadystatechange = function(){
    if (this.readyState == 4 && this.status == 200){
      
      document.getElementById("result").innerHTML = xhr.responseText;

    }
  }
xhr.open("GET", "world.php?country="+inputVal);
xhr.send();
})


// document.getElementsByClassName("lookup-cities")[0].addEventListener("click", function(){
    
//     var inputVal = document.getElementById("country").value;

// var xhr = new XMLHttpRequest();
// xhr.onreadystatechange = function(){
//     if (this.readyState == 4 && this.status == 200){
      
//       document.getElementById("result").innerHTML = xhr.responseText;

//     }
//   }
// xhr.open("GET", " world.php?city="+inputVal);
// xhr.send();
// })
}