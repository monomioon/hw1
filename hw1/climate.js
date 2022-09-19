//API DI IMDb
const key = "k_bkt5arqy";
const number = 5;

var requestOptions = {
    method: 'GET',
    redirect: 'follow'
  };


  //tramite questa funzione ottengo l'id del film
  function onJson(json, i){
    id_film = json.results[0].id;
    console.log("L'id del film è" + id_film);
    //debugger;
    //Una volta ottenuto l'id del film posso usare l'api che utilizza wikipedia per ottenere la descrizione del film
    fetch('https://imdb-api.com/en/API/Wikipedia/'+key+'/'+id_film, requestOptions)
    .then(onResponse).then(json => (onJson2(json, i)));
  }


  function onResponse(response){
    console.log('Risposta ricevuta');
    return response.json();
  }


  function onJson2(json, i){
    console.log('JSON ricevuto 2');
    const text = json.plotShort.plainText;

    //Aggiunge il testo alla pagina
    console.log(text);
    const p = document.createElement("p");
    p.textContent=text;
    const d = document.querySelector('div [data-id="'+i+'"]');
    d.appendChild(p);
  }

  

  //questa è la fetch iniziale che trova l'id tramite il titolo
 for(let i=1; i<6; i++){
     let dd = document.querySelector('div [data-number="'+i+'"]');
     console.log("il titolo è:");
     console.log(dd.dataset.title);
     fetch('https://imdb-api.com/en/API/SearchMovie/'+key+'/'+dd.dataset.title, requestOptions)
    .then(onResponse).then(j => {
        //debugger;
        onJson(j,i)});
     dd.nextSibling;
 }