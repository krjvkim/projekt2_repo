//App. js ist für die Erstellung von statischen Single-Page-Apps konzipiert. 
//Das bedeutet, dass es die gesamte Seitennavigation innerhalb der Session der Webseite hält und "Seiten" als DOM-Knoten definiert, die instanziiert werden können. 
//Seiten sind HTML-Elemente, die bestimmte generische Komponenten wie eine Kopfleiste und einen Inhaltsbereich haben.

const express = require('express');
const app = express();
const PORT = process.env.PORT || 3000;

app.get('/', (req, res) => {
  res.sendFile(path.resolve('webappstartseite.html'));
})



app.listen(PORT, () => {
  console.log(`Example app listening on port ${PORT}`)
})
