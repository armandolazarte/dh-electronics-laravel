var countriesField = document.querySelector ('select[name = country]');

 fetch('http://country.io/names.json')

 .then(response => response.json())

 .then(function (data){
   console.log(data)
   for(country in data){
     var opt = document.createElement('option');
     opt.innerHTML = data[country];
     countriesField.append(opt);
   };
 })
   .catch(function (error){
     console.error(error);
 })


var stateField = document.querySelector ('select[name = state]');

 fetch('http://dev.digitalhouse.com/api/getProvincias')

 .then(response => response.json())
 .then(function (todaLaData){
   console.log(todaLaData)
   for (var i = 0; i < todaLaData.data.length; i++){
     var opt = document.createElement('option');
     opt.value = i;
     opt.innerHTML = todaLaData.data[i].state;
     stateField.appendChild(opt);

   };
 })
   .catch(function (error){
     console.error(error);
 })

 // opcion ver las provincias si soy de argentina !!
stateField.style.visibility = "hidden";

countriesField.onchange = function (){

  if (this.value == "Argentina") {
    stateField.style.visibility = "visible";
  }
  else {
    stateField.style.visibility = "hidden";
  }
};
