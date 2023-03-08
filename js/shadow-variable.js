const articleList = []; // In a real app this list would be full of articles.
//remplacement de kudos par maxKudos pour indiquer clairement son utilité.
const maxKudos = 5;

function calculateTotalKudos(articles) {
  var kudos = 0;
  
  for (let article of articles) {
    kudos += article.kudos;
  }
  
  return kudos;
}

//Utilisation d'une variable pour stocker la valeur totale pour une meilleure lisibilité.
var kudos = calculateTotalKudos(articleList);

document.write(`
  <p>Maximum kudos you can give to an article: ${maxKudos}</p>
  <p>Total Kudos already given across all articles: ${kudos}</p>
`);
